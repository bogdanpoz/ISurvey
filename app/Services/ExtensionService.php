<?php

namespace App\Services;

use App\Models\Extension;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;

class ExtensionService
{
    private $app;

    public function __construct()
    {
        $this->app = 'survey-bird';
    }

    public function allExtensions()
    {
        return Http::withHeaders([
            'Accept' => 'application/json'
        ])->get(config('services.cedex.url') . 'extensions', [
            'app' => $this->app,
        ])->json();
    }

    public function install($extensionName)
    {
        if($this->download($extensionName)) {
            $this->saveToTable($extensionName);
            $this->enable($extensionName);

            flash(__('Extension installed successfully.'), 'success');
        }
    }

    public function download($extensionName)
    {
        $response = $this->getDownloadLink($extensionName);

        if($response->failed()) {
            $errors = collect($response->json()['errors'])->flatten();

            flash(implode('\n',$errors->all()), 'error');

            return false;
        }

        $extensionPath = dirname(__FILE__).'/../../Modules/';
        $extensionFile = $extensionPath . $extensionName . '.zip';

        file_put_contents($extensionFile, fopen($response['download_link'], 'r'));

        $zip = new \ZipArchive();

        $response = $zip->open($extensionFile);

        if(!$response) {
            return false;
        }

        $zip->extractTo($extensionPath);
        $zip->close();

        File::delete($extensionFile);

        return true;
    }

    public function getDownloadLink($extensionName)
    {
        return Http::withHeaders([
            'Accept' => 'application/json'
        ])->get(config('services.cedex.url') . 'extensions/verify', [
            'app' => $this->app,
            'extension_name' => $extensionName,
            'envato_purchase_code' => setting()->get('envato_purchase_code'),
        ]);
    }

    public function enable($extensionName)
    {
        Artisan::call('module:enable ' . $extensionName);
    }

    public function saveToTable($extensionName)
    {
        $extensionPath = dirname(__FILE__).'/../../Modules/';
        $extensionFile = $extensionPath . $extensionName . '.zip';

        $configurationFile = $extensionPath.'/'.$extensionName.'/module.json';
        $configuration = json_decode(file_get_contents($configurationFile), true);

        Extension::create([
            'name' => $configuration['name'],
            'code' => $configuration['alias'],
            'description' => $configuration['description'],
            'version' => $configuration['version'],
        ]);
    }
}
