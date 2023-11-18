<?php

namespace Core\Exceptions;

use App\Contract\ResponseInterface;
use App\Response\HtmlResponse;
use App\Response\JsonResponse;
use App\View\ViewEngine;
use Exception;

class ExceptionHandler
{
    public static function handle(Exception $exception): ResponseInterface
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

        return $response;
    }
}