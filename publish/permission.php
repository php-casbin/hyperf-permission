<?php

return [
    /*
    * Casbin model setting.
    */
    'model' => [
        // Available Settings: "file", "text"
        'config_type' => 'file',

        'config_file_path' => __DIR__ . '/casbin-rbac-model.conf',

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

    'log' => [
        // changes whether Lauthz will log messages to the Logger.
        'enabled' => false,
    ],
];
