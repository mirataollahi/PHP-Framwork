<?php

namespace Core\Providers;

use App\Request\CreateUserRequest;
use App\Request\Request;
use Core\ViewEngine\ViewEngine;

abstract class BaseServiceProvider
{
    public static array $container = [];

    public function __construct()
    {
        $this->handle();
    }


    /**
     * Register application services in container
     *
     * @return void
     */
    abstract  public function handle(): void;

    /**
     * Register services array in container
     *
     * @param array $services Application services list
     * @return void
     */
    public function registerContainerServices(array $services): void
    {
        foreach ($services as $serviceKey => $service) {
            $this->register($serviceKey, $service);
        }
    }


    /**
     * Register a service in application container
     *
     * @param string $referenceAlias Reference of the class or object in container
     * @param mixed $classOrObject The class or object to store in container
     * @return void
     */
    public function register(string $referenceAlias, mixed $classOrObject): void
    {
        if (is_object($classOrObject))
            static::$container[ucfirst($referenceAlias)] = $classOrObject;
        else {
            if (class_exists($classOrObject))
                static::$container[ucfirst($referenceAlias)] = new $classOrObject;
        }
    }

    /**
     * Get a service from application container
     *
     * @param string $serviceAlias
     * @return mixed
     */
    public function get(string $serviceAlias): mixed
    {
        return (array_key_exists(ucfirst($serviceAlias) , self::$container))
            ? self::$container[ucfirst($serviceAlias)]
            : null;
    }


}