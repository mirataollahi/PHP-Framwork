<?php

namespace Core\Exceptions;

use Exception;
class ServerErrorException extends Exception
{
    /**
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage = '')
    {
        parent::__construct("Server Error : " . $errorMessage , 510);
    }
}
