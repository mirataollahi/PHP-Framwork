<?php

namespace Core\Exceptions;

use Exception;
class ViewFileNotFoundException extends Exception
{
    /**
     * @param string|null $viewPath
     */
    public function __construct(string|null $viewPath = null)
    {
        parent::__construct("The view file not found is this path : {$viewPath}" , 512);
    }
}