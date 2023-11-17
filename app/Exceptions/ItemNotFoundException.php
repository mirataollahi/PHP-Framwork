<?php

namespace App\Exceptions;

use Exception;
class ItemNotFoundException extends Exception
{

    public function __construct()
    {
        parent::__construct("Model item not found" , 510);
    }
}
