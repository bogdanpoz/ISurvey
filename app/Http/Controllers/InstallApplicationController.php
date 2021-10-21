<?php

namespace App\Http\Controllers;

use App\Installer\PermissionsChecker;
use App\Installer\RequirementsChecker;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class InstallApplicationController extends Controller
{
    protected $permissions;

    protected $requirements;

    public function __construct(PermissionsChecker $permissions, RequirementsChecker $requirements)
    {
        $this->permissions = $permissions;

        $this->requirements = $requirements;
    }

    public function welcome()
    {
        return view('installer.welcome');
    }

    public function permissions()
    {
        $permissions = $this->permissions->check(
            config('installer.permissions')
        );

        return view('installer.permissions', compact('permissions'));
    }

    public function requirements()
    {
        $phpSupportInfo = $this->requirements->checkPHPversion(
            config('installer.core.minPhpVersion')
        );

        $requirements = $this->requirements->check(
            config('installer.requirements')
        );

        return view('installer.requirements', compact('requirements', 'phpSupportInfo'));
    }

    public function environment()
    {
        $inputs = config('installer.environment.inputs');

        return view('installer.environment', compact('inputs'));
    }

    public function storeEnvironment(Request $request)
    {
        $inputs = collect(config('installer.environment.inputs'))
            ->pluck('validation', 'key')
            ->all();

        $validatedData = $request->validate($inputs);

        foreach ($validatedData as $key => $value) {
            DotenvEditor::setKey($key, $value);
        }

        DotenvEditor::save();

        return redirect()->route('install.configure');
    }

    public function configure()
    {
        $this->executeLaravelCommands();

        $this->createInstallFile();

        return redirect()->route('install.finished');
    }

    public function finished()
    {
        return view('installer.finished');
    }

    private function executeLaravelCommands()
    {
        Artisan::call('key:generate');

        Artisan::call('cache:clear');

        Artisan::call('config:clear');

        Artisan::call('migrate:fresh');

        Artisan::call('storage:link');
    }

    private function createInstallFile()
    {
        $installedLogFile = storage_path('installed');

        $dateStamp = date('Y/m/d h:i:sa');

        if (! file_exists($installedLogFile)) {
            $message = $dateStamp."\n";

            file_put_contents($installedLogFile, $message);
        } else {
            $message = $dateStamp;

            file_put_contents($installedLogFile, $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
    }

    private function checkDatabaseConnection()
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            flash(__('Could not connect to the database.  Please check your configuration. error:'). $e);

            return false;
        }
    }
}
