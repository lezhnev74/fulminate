<?php
return [
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false,
    
    'db' => [
        'default_driver' => 'sqlite',
        'sqlite' => [
            'path' => env('DB_PATH_SQLITE', storage_path('db/db.sqlite')),
            'user' => env('DB_USER'),
            'pass' => env('DB_PASS'),
            'dbname' => env('DB_NAME'),
        ],
        'mysql' => [
            'host' => env('DB_HOST'),
            'user' => env('DB_USER'),
            'pass' => env('DB_PASS'),
            'dbname' => env('DB_NAME'),
        ],
    ],
];