<?php


use Core\Application\Application;
use Core\Request\Request;
use Core\Request\RequestFactory;

if (!function_exists('path'))
{
    /**
     * Get base application root directory as string
     * @param string|null $path file or directory address base on root path
     * @return string
     */
    function path(string|null $path = null): string
    {
        $rootPath =  __DIR__ . "/../" ;
        return $path ? $rootPath . $path : $rootPath;
    }
}

if (!function_exists('request')) {
    /**
     * Get application request instance with singleton pattern
     * @return Request
     */
    function request(): Request
    {
        return RequestFactory::get();
    }
}

if (!function_exists('asset')) {
    /**
     * Get asset file address
     * @param string $assetFileAddress Asset file address form public folder
     * @return string
     */
    function asset(string $assetFileAddress): string
    {
        if (str_starts_with($assetFileAddress, "/")) {
            $assetFileAddress = substr($assetFileAddress, 1);
        }
        return request()->url().$assetFileAddress;
    }
}

if (!function_exists('config')) {
    /**
     * Get config index
     * @param string $configIndex config index name in app.php
     * @return string
     */
    function config(string $configIndex): string
    {
        return \Core\Config\Config::find($configIndex);
    }
}

if (!function_exists('app')){

    /**
     * Create or get core application instance with singleton design
     *
     * @return Application Current running application instance
     */
    function app(): Application
    {
        return Application::create();
    }
}