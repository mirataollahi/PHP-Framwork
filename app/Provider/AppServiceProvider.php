<?php

namespace App\Provider;

use App\Request\CreateUserRequest;
use Core\Request\Request;
use Core\Config\EnvironmentHandler;
use Core\ViewEngine\ViewEngine;
use Core\Providers\BaseServiceProvider;

class AppServiceProvider extends BaseServiceProvider
{

    /**
     * Register application services in container
     *
     * @return void
     */
    public function handle(): void
    {
        $this->registerContainerServices([
            'EnvironmentHandler' => EnvironmentHandler::class,
            'Request' => Request::class,
            'ViewEngine' => ViewEngine::class,
            'CreateCredentialsRequest' => CreateUserRequest::class,

        ]);
    }


}