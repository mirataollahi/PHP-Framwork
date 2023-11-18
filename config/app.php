<?php

return [


    /*
     * Application base information
     */
    'app_name' => env('APP_NAME' , 'php_framework') ,




    /*
     * Database Connection Information
     */

    'database' => [
        'driver' => env('DB_DRIVER' , '127.0.0.1'),
        'host' => env('DB_HOST' , 'root'),
        'database' => env('DB_DATABASE' ,'php_framework'),
        'username' => env('DB_USER' , 'root'),
        'password' => env('DB_PASSWORD' , 'password'),
        'charset' => env('CHARSET' , 'utf8'),
        'collation' => 'utf8_unicode_ci',
        'prefix' => env('DB_PREFIX' , ''),
    ]











];



