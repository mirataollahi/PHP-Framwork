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
    /**
     * Current static application instance
     *
     * @var Application
     */
    protected static Application $application;

    /**
     * Application service provider and container
     *
     * @var AppServiceProvider
     */
    protected AppServiceProvider $serviceProvider;


    /**
     * Create or get current application instance with singleton design
     *
     * @return static
     */
    public static function create():static
    {
        if (!isset(static::$application))
            static::$application = new self();

        return self::$application;
    }

    private function __construct()
    {
        $this->serviceProvider = new AppServiceProvider();
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


                $dependencyService = ($this->serviceProvider->get(
                    class_basename($dependencyClassName)
                ));

                if ($dependencyService)
                    $dependencies[] = $dependencyService;

                else $dependencies[] = new $dependencyClassName;
            }
        }
        return $dependencies;
    }

    /**
     * make object with application service provider
     *
     * @param string $classAlias
     * @return mixed
     */
    public function make(string $classAlias):mixed
    {
        return $this->serviceProvider->get($classAlias);
    }

    /**
     * @param string $classAlias
     * @param string|object $classOrObject
     * @return void
     */
    public function bind(string $classAlias , string|object $classOrObject): void
    {
        $this->serviceProvider->register($classAlias , $classOrObject);
    }

}