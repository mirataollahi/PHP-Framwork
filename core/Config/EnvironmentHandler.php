<?php

namespace Core\Config;

use Core\Contract\ServiceProviderInterface;
use Dotenv\Dotenv;

class EnvironmentHandler implements ServiceProviderInterface
{
    public function boot(): void
    {
        $dotenv = Dotenv::createImmutable(path());
        $dotenv->load();
    }
}