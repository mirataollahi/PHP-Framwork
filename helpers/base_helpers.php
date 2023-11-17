<?php


use App\Request\Request;

if (!function_exists('basePath'))
{
    /**
     * Get base application root directory as string
     *
     * @param string|null $path file or directory address base on root path
     *
     * @return string
     */
    function path(string|null $path = null): string
    {
        $rootPath =  __DIR__ . "/../" ;
        return $path ? $rootPath . $path : $rootPath;
    }


    /**
     * Get application request instance with singleton pattern
     *
     * @return Request
     */
    function request(): Request
    {
        return \App\Request\RequestFactory::get();
    }
}
