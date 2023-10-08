<?php

namespace Core\ServiceProvider;


use Core\Request\Request;


class ServiceProvider
{
    public array $services = [];
    public function __construct()
    {
        $this->registerRequestService();
    }

    public function registerRequestService():void
    {
        $this->services ['request'] = new Request();
    }


    public function findService(string $serviceName): ServiceInterface|null
    {
        return array_key_exists($serviceName , $this->services)
            ? $this->services[$serviceName] : null;
    }
}