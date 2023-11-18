<?php

namespace Core\Router;


class Route
{

    /**
     * Route uniform resource identifier
     *
     * @var string
     */
    public string $uri ;

    /**
     * Related controller class of the route
     * @var string
     */
    public string $controller;

    /**
     * Method name of the related controller
     * @var string
     */
    public string $method;

    /**
     * Http request type with get default
     *
     * @var string
     */
    public string $requestMethod = 'get';

    /**
     * Route unique name
     *
     * @var string|null
     */
    public string|null $name = null;

    /**
     * @param string $uri Route uniform resource identifier
     * @param string $controllerClass Related controller class of the route
     * @param string $methodName Method name of the related controller
     * @param string $requestMethod Http request type with get default
     */
    public function __construct(string $uri , string $controllerClass , string $methodName , string|null $routeName = null, string $requestMethod = 'get')
    {
        $this->uri = $uri;
        $this->controller = $controllerClass ;
        $this->method = $methodName ;
        $this->name = $routeName;
        $this->requestMethod = strtolower($requestMethod);
    }

    /**
     * Create new get route and add to application router
     *
     * @param string $uri
     * @param array $controllerAndMethod
     * @param string|null $routeName
     * @param string $requestMethod
     * @return void
     */
    public static function get(string $uri , array $controllerAndMethod , string|null $routeName = null , string $requestMethod = 'get'): void
    {
        Router::add(
            new self($uri , $controllerAndMethod[0] , $controllerAndMethod[1] , $routeName , $requestMethod)
        );
    }

    /**
     * Create new post route and add to application route
     *
     * @param string $uri
     * @param array $controllerAndMethod
     * @param string|null $routeName
     * @param string $requestMethod
     * @return void
     */
    public static function post(string $uri , array $controllerAndMethod , string|null $routeName = null , string $requestMethod = 'get'): void
    {
        Router::add(
            new self($uri , $controllerAndMethod[0] , $controllerAndMethod[1] , $routeName , $requestMethod)
        );
    }

}