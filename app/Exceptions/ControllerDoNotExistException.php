<?php

namespace App\Exceptions;
use Exception;
class ControllerDoNotExistException extends Exception
{
    /**
     * @param string|null $controller
     */
    function __construct(string|null $controller = null)
    {
        parent::__construct("Controller not found : {$controller}" , 405);
    }
}
