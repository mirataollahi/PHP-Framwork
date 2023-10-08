<?php

namespace Core\Framework;


use Core\ServiceProvider\ServiceInterface;
use Core\ServiceProvider\ServiceProvider;

class Application
{
    /**
     * The application container . There is only one app or container instance in this application
     *
     * @var Application|null
     */
    private static Application|null $app = null;
    protected ServiceProvider $serviceProvider ;

    private function __construct()
    {
        $this->serviceProvider = new ServiceProvider();
    }

    /**
     * Get application instance or container or create a new one
     *
     *
     * @return Application The application container
     */
    public static function make(): static
    {
        if (is_null(self::$app)) {
            self::setContainer();
        }

        return self::$app;
    }


    /**
     * Set application static container
     *
     * @return void
     */
    public static function setContainer(): void
    {
        self::$app = new self();
    }

    /**
     * Search in registered service and find math service or return null
     *
     * @param string $name
     * @param array $arguments
     * @return ServiceInterface|null
     */
    function __call (string $name , array $arguments ): ServiceInterface|null
    {
        return $this->serviceProvider->findService($name);
    }

    /**
     * When call an undefined property in app instance , Search in registered service and find math service or return null

     * @param string $name
     * @return ServiceInterface|null
     */
    function __get (string $name ): ServiceInterface|null
    {
        return $this->serviceProvider->findService($name);
    }
}