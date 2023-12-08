<?php

namespace Core\Bootstrap;

use Core\Application\Application;
use Core\Exceptions\ExceptionHandler;
use Core\Response\ResponseGenerator;
use Exception;
use Illuminate\Support\Facades\App;

class ApplicationBootstrapper
{


    public static function boot(): void
    {
        try
        {
            $app = Application::create();
            $responseGenerator = new ResponseGenerator(
                $app->run()
            );

            $responseGenerator->make();
        }


        catch (Exception $exception)
        {
           ExceptionHandler::handle($exception);
        }
    }
}