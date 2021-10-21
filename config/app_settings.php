<?php

return [
        'sections' => [
            'general' => [
                'title' => 'General',
                'inputs' => [
                    [
                        'label' => 'Application Name',
                        'key' => 'APP_NAME',
                        'storage' => 'env',
                        'type' => 'text',
                        'class' => 'col-sm-6',
                    ],

                    [
                        'label' => 'Environment',
                        'key' => 'APP_ENV',
                        'storage' => 'env',
                        'type' => 'text',
                        'class' => 'col-sm-6',
                    ],

                    [
                        'label' => 'Debug Level',
                        'key' => 'APP_DEBUG',
                        'storage' => 'env',
                        'type' => 'text',
                        'class' => 'col-sm-6',
                    ],

                    [
                        'label' => 'Application URL',
                        'key' => 'APP_URL',
                        'storage' => 'env',
                        'type' => 'text',
                        'class' => 'col-sm-6',
                    ],
                ]
            ],

            'mail' => [
                'title' => 'Email',
                'inputs' => [
                    [
                        'label' => 'Driver',
                        'key' => 'MAIL_DRIVER',
                        'storage' => 'env',
                        'type' => 'text',
                        'class' => 'col-sm-6',
                    ],

                    [
                        'label' => 'Host',
                        'key' => 'MAIL_HOST',
                        'storage' => 'env',
                        'type' => 'text',
                        'class' => 'col-sm-6',
                    ],

                    [
                        'label' => 'Port',
                        'key' => 'MAIL_PORT',
                        'storage' => 'env',
                        'type' => 'text',
                        'class' => 'col-sm-6',
                    ],

                    [
                        'label' => 'Username',
                        'key' => 'MAIL_USERNAME',
                        'storage' => 'env',
                        'type' => 'text',
                        'class' => 'col-sm-6',
                    ],

                    [
                        'label' => 'Password',
                        'key' => 'MAIL_PASSWORD',
                        'storage' => 'env',
                        'type' => 'text',
                        'class' => 'col-sm-6',
                    ],

                    [
                        'label' => 'Encryption',
                        'key' => 'MAIL_ENCRYPTION',
                        'storage' => 'env',
                        'type' => 'text',
                        'class' => 'col-sm-6',
                    ]
                ]
            ],

            'localization' => [
                'title' => 'Localization',
                'inputs' => [
                    [
                        'label' => 'Currency',
                        'key' => 'currency',
                        'storage' => 'database',
                        'type' => 'text',
                        'class' => 'col-sm-2',
                    ]
                ]
            ],
        ]
    ];