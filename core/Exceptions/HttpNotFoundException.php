<?php

namespace Core\Exceptions;

use Exception;

class HttpNotFoundException extends Exception
{
    /**
     * Exception throw in not found uri
     */
    function __construct()
    {
        parent::__construct("Page not found" , 404);
    }
}
