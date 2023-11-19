<?php

namespace Core\Bootstrap;

use Core\Application\Application;
use Core\Exceptions\ExceptionHandler;
use Core\Response\ResponseGenerator;
use Exception;

class ApplicationBootstrapper
{

    public static function boot(): void
    {
        try
        {
            $app = new Application();
            $responseGenerator = new ResponseGenerator(
                $app->run()
            );

            $responseGenerator->make();
        }
        catch (Exception $exception)
        {
            $responseGenerator = ExceptionHandler::handle($exception);
        }
    }
}