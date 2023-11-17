<?php

namespace App\Request;

class RequestFactory
{
    /**
     * Application static and unique request instance
     *
     * @var Request|null
     */
    private static Request|null $requestInstance = null;


    /**
     * Get Request instance with singleton pattern design
     *
     * @return Request
     */
    public static function get(): Request
    {
        if (self::$requestInstance === null) {
            self::$requestInstance = new Request();
        }
        return self::$requestInstance;
    }
}