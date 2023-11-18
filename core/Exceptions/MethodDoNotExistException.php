<?php

namespace Core\Exceptions;

use Exception;

class MethodDoNotExistException extends Exception
{

    /**
     * @param string|null $controller
     * @param string|null $method
     */
    function __construct(string|null $controller = null, string|null $method = null)
    {
        $message = ($method && $controller)
            ? "Method {$method} do not exist in {$controller} class"
            : "Method do not exist in controller";

        parent::__construct($message , 406);
    }
}