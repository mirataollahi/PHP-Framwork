<?php

namespace App\Framework;

use App\Database\DatabaseConnection;
use App\Exceptions\ExceptionHandler;
use App\Provider\AppServiceProvider;
use App\Request\Request;
use App\Request\RequestFactory;
use App\View\ViewEngine;
use Exception;
use App\Router\Router;
use ReflectionClass;
use ReflectionMethod;

class Application
{
    protected static AppServiceProvider $serviceProvider;

    public function __construct()
    {
        static::$serviceProvider = new AppServiceProvider();
    }

    public function run(): mixed
    {
        try {
            $router = new Router();
            new DatabaseConnection();


            [$controllerClass, $methodName] = $router->getRelatedControllerAndMethod();
            $reflectionClass = new ReflectionClass($controllerClass);
            $classInstance = $reflectionClass->newInstance();

            $reflectionMethod = $reflectionClass->getMethod($methodName);

            $dependencies = $this->handleDependencyInjection(reflectionMethod: $reflectionMethod);

            return $reflectionMethod->invokeArgs($classInstance, $dependencies);
        } catch (Exception $exception) {
            return ExceptionHandler::handle($exception);
        }

    }


    /**
     * @param ReflectionMethod $reflectionMethod
     * @return array
     */
    public function handleDependencyInjection(ReflectionMethod $reflectionMethod): array
    {
        $dependencies = [];
        $methodParameters = $reflectionMethod->getParameters();
        foreach ($methodParameters as $parameter) {
            $dependencyClass = $parameter->getClass();
            if ($dependencyClass) {
                $dependencyClassName = $dependencyClass->getName();


                $dependencyService = (static::$serviceProvider->get(
                    class_basename($dependencyClassName)
                ));

                if ($dependencyService)
                    $dependencies[] = $dependencyService;

                else $dependencies[] = new $dependencyClassName;
            }
        }
        return $dependencies;
    }

}