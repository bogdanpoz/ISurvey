<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = [
            [
                'title' => __('Account Setting'),
                'description' => 'Update your email, name, password, etc',
                'route' => route('admin.profile.edit'),
            ],

            [
                'title' => __('General'),
                'description' => 'Update the application name, URL, etc',
                'route' => route('admin.settings.edit', 'general'),
            ],

            [
                'title' => __('Email (SMTP)'),
                'description' => 'Update email SMTP configurations',
                'route' => route('admin.settings.edit', 'mail'),
            ],

            [
                'title' => __('Languages'),
                'description' => 'Create, update, delete application languages',
                'route' => route('admin.language.index'),
            ],

            [
                'title' => __('Localization'),
                'description' => 'Update the application locale',
                'route' => route('admin.settings.edit', 'localization'),
            ],

            [
                'title' => __('Artisan Commands'),
                'description' => 'Run the Artisan commands',
                'route' => route('admin.commands.index'),
            ],

            [
                'title' => __('Language Translation'),
                'description' => 'Translate the application language',
                'route' => '/admin/translations',
            ],
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function edit($sectionId)
    {
        $section = config('app_settings.sections')[$sectionId];

        return view('admin.settings.edit', [
            'section' => $section,
            'sectionId' => $sectionId,
            'settings' => $this->getKeysWithValues($section),
        ]);
    }

    public function update($sectionId, Request $request)
    {
        $section = config('app_settings.sections')[$sectionId];

        $settings = $this->getKeysWithValues($section);

        $inputs = $request->only(array_keys($settings));

        foreach ($inputs as $key => $value) {
            if ('env' == $this->getKeyType($section, $key)) {
                DotenvEditor::setKey($key, $value);
            } else {
                settings()->set($key, $value);
            }
        }

        DotenvEditor::save();

        return redirect()->back();
    }

    private function getKeysWithValues($section)
    {
        foreach ($section['inputs'] as $input) {
            if ('env' == $input['storage']) {
                $settings[$input['key']] = DotenvEditor::keyExists($input['key']) ? DotenvEditor::getValue($input['key']) : '';
            }

            if ('database' == $input['storage']) {
                $settings[$input['key']] = settings()->get($input['key']);
            }
        }

        return $settings;
    }

    private function getKeyType($section, $key)
    {
        foreach ($section['inputs'] as $input) {
            if ($key == $input['key']) {
                return $input['storage'];
            }
        }
    }
}
