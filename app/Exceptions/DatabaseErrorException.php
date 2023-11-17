<?php

namespace App\Exceptions;

use Exception;
class DatabaseErrorException extends Exception
{
    /**
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage = '')
    {
        parent::__construct("Database Error : " . $errorMessage , 510);
    }
}
