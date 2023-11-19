<?php

namespace Core\Exceptions;

use Core\Contract\ResponseInterface;
use Core\Response\HtmlResponse;
use Core\Response\JsonResponse;
use Core\ViewEngine\ViewEngine;
use Exception;
use JetBrains\PhpStorm\NoReturn;

class ExceptionHandler
{
    /**
     * @param Exception $exception
     * @return void
     */
    #[NoReturn]
    public static function handle(Exception $exception): void
    {

        $response = new JsonResponse();
        if (
            $exception instanceof HttpNotFoundException ||
            $exception instanceof ControllerDoNotExistException ||
            $exception instanceof MethodDoNotExistException ||
            $exception instanceof ServerErrorException ||
            $exception instanceof DatabaseErrorException ||
            $exception instanceof ItemNotFoundException
        ) {
            $response->fail([], $exception->getMessage(), $exception->getCode());
        }

        else {
            $response->fail([
                'file' => $exception->getFile() ,
                'trace'=> $exception->getTrace() ,
            ] , $exception->getMessage() , 500);
        }

        $response->terminate();
    }
}