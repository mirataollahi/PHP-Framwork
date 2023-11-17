<?php

namespace App\Router;

use App\Config\Config;
use App\Exceptions\ControllerDoNotExistException;
use App\Exceptions\MethodDoNotExistException;
use App\Request\Request;
use App\Exceptions\HttpNotFoundException;
use App\Request\RequestFactory;

class Router
{

    /**
     * Current application route get by current request uri
     *
     * @var Route|null
     */
    public Route|null $currentRoute = null ;

    /**
     * Related route base on current uri
     *
     * @var array|null
     */
    public static array|null $routes = [];

    /**
     * Construct App Router class and register application routes
     *
     * @throws HttpNotFoundException
     */
    public function __construct()
    {
        $this->setAppRoutes();
        $request = RequestFactory::get();
        $this->setCurrentRoute($request);
    }

    /**
     * Load application routes base on route.php file in config directory
     *
     * @return void
     */
    public function setAppRoutes(): void
    {
        include __DIR__ . "/../../route/web.php";
    }


    /**
     * Find current route base on current request uri
     *
     * @param Request $request
     * @return mixed
     * @throws HttpNotFoundException
     */
    public function setCurrentRoute(Request $request): bool
    {
        $currentUri = explode('?', $request->uri())[0]; // Ignore query parameters

        foreach (self::$routes as $route) {
            if ($route->uri === $currentUri)
            {
                $this->currentRoute = $route;
                return true;
            }
        }

        throw new HttpNotFoundException();
    }

    /**
     * Get current route set with class constructor method
     *
     * @Route array|null
     */
    public function getCurrentRoute(): Route|null
    {
        return $this->currentRoute;
    }

    /**
     * Add route to application routes
     *
     * @param Route $route
     * @return void
     */
    public static function add(Route $route): void
    {
        static::$routes [] = $route;
    }

    /**
     * Check related controller and method and return them
     * throw exceptions if controller or method ir route not found
     *
     *
     * @return array
     * @throws ControllerDoNotExistException
     * @throws MethodDoNotExistException
     */
    public function getRelatedControllerAndMethod(): array
    {
        $currentRoute = $this->getCurrentRoute();
        $controllerClass = $currentRoute->controller;
        $methodName = $currentRoute->method;

        if (!class_exists($controllerClass))
            throw new ControllerDoNotExistException($controllerClass);

        if (!method_exists($controllerClass , $methodName))
            throw new MethodDoNotExistException($controllerClass , $methodName);

        return [
          $controllerClass ,
          $methodName
        ];
    }
}
