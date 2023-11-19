<?php

namespace Core\Application;


use App\Provider\AppServiceProvider;
use Core\Database\DatabaseConnection;
use Core\Exceptions\ControllerDoNotExistException;
use Core\Exceptions\MethodDoNotExistException;
use Core\Router\Router;
use ReflectionClass;
use ReflectionMethod;
use ReflectionException;

class Application
{
    protected static AppServiceProvider $serviceProvider;

    public function __construct()
    {
        static::$serviceProvider = new AppServiceProvider();
    }

    /**
     * @throws ControllerDoNotExistException
     * @throws MethodDoNotExistException
     * @throws ReflectionException
     */
    public function run(): mixed
    {
        $router = new Router();
        new DatabaseConnection();


        [$controllerClass, $methodName] = $router->getRelatedControllerAndMethod();
        $reflectionClass = new ReflectionClass($controllerClass);
        $classInstance = $reflectionClass->newInstance();

        $reflectionMethod = $reflectionClass->getMethod($methodName);

        $dependencies = $this->handleDependencyInjection(reflectionMethod: $reflectionMethod);

        return $reflectionMethod->invokeArgs($classInstance, $dependencies);


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