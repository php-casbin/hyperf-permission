<?php

return [
    /*
    * Casbin model setting.
    */
    'model' => [
        // Available Settings: "file", "text"
        'config_type' => 'file',

        'config_file_path' => config_path('casbin-rbac-model.conf'),

        'config_text' => '',
    ],

    /*
    * Casbin adapter .
    */
    'adapter' => Hyperf\Permission\Adapters\DatabaseAdapter::class,

    /*
    * Database setting.
    */
    'database' => [
        // Database connection for following tables.
        'connection' => '',

        // Rule table name.
        'rules_table' => 'rules',
    ],
];
