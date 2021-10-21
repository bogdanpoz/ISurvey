<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Server Requirements
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel server requirements, you can add as many
    | as your application require, we check if the extension is enabled
    | by looping through the array and run "extension_loaded" on it.
    |
    */
    'core' => [
        'minPhpVersion' => '7.3.0',
    ],
    'final' => [
        'key' => true,
        'publish' => false,
    ],
    'requirements' => [
        'php' => [
            'openssl',
            'pdo',
            'mbstring',
            'tokenizer',
            'JSON',
            'cURL',
        ],
        'apache' => [
            'mod_rewrite',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel folders permissions, if your application
    | requires more permissions just add them to the array list bellow.
    |
    */
    'permissions' => [
        'storage/framework/'     => '775',
        'storage/logs/'          => '775',
        'bootstrap/cache/'       => '775',
    ],

    /*
    |--------------------------------------------------------------------------
    | Environment Form Wizard Validation Rules & Messages
    |--------------------------------------------------------------------------
    |
    | This are the default form field validation rules. Available Rules:
    | https://laravel.com/docs/5.4/validation#available-validation-rules
    |
    */
    'environment' => [
        'inputs' => [
            [
                'label' => 'Application Name',
                'key' => 'APP_NAME',
                'type' => 'text',
                'class' => 'col-sm-6',
                'validation' => 'required|string|max:50',
                'default' => 'iNextSurvey',
            ],

            [
                'label' => 'Environment (local or production)',
                'key' => 'APP_ENV',
                'type' => 'text',
                'class' => 'col-sm-6',
                'validation' => 'required|string|max:50',
                'default' => 'local',
            ],

            [
                'label' => 'Application URL',
                'key' => 'APP_URL',
                'type' => 'text',
                'class' => 'col-sm-6',
                'validation' => 'required|url',
                'default' => 'http://localhost',
            ],

            [
                'label' => 'Database Connection',
                'key' => 'DB_CONNECTION',
                'type' => 'text',
                'class' => 'col-sm-6',
                'validation' => 'required|string|max:50',
                'default' => 'mysql',
            ],

            [
                'label' => 'Database Host',
                'key' => 'DB_HOST',
                'type' => 'text',
                'class' => 'col-sm-6',
                'validation' => 'required|string|max:50',
                'default' => 'localhost',
            ],

            [
                'label' => 'Database Port',
                'key' => 'DB_PORT',
                'type' => 'text',
                'class' => 'col-sm-6',
                'validation' => 'required|numeric',
                'default' => '3306',
            ],

            [
                'label' => 'Database Name',
                'key' => 'DB_DATABASE',
                'type' => 'text',
                'class' => 'col-sm-6',
                'validation' => 'required|string|max:50',
                'default' => null,
            ],

            [
                'label' => 'Database Username',
                'key' => 'DB_USERNAME',
                'type' => 'text',
                'class' => 'col-sm-6',
                'validation' => 'required|string|max:50',
                'default' => null,
            ],

            [
                'label' => 'Database Password',
                'key' => 'DB_PASSWORD',
                'type' => 'password',
                'class' => 'col-sm-6',
                'validation' => 'nullable|string|max:50',
                'default' => null,
            ],
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Installed Middleware Options
    |--------------------------------------------------------------------------
    | Different available status switch configuration for the
    | canInstall middleware located in `canInstall.php`.
    |
    */
    'installed' => [
        'redirectOptions' => [
            'route' => [
                'name' => 'welcome',
                'data' => [],
            ],
            'abort' => [
                'type' => '404',
            ],
            'dump' => [
                'data' => 'Dumping a not found message.',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Selected Installed Middleware Option
    |--------------------------------------------------------------------------
    | The selected option fo what happens when an installer instance has been
    | Default output is to `/resources/views/error/404.blade.php` if none.
    | The available middleware options include:
    | route, abort, dump, 404, default, ''
    |
    */
    'installedAlreadyAction' => '',

    /*
    |--------------------------------------------------------------------------
    | Updater Enabled
    |--------------------------------------------------------------------------
    | Can the application run the '/update' route with the migrations.
    | The default option is set to False if none is present.
    | Boolean value
    |
    */
    'updaterEnabled' => 'true',

];
