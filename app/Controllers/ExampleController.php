<?php

namespace App\Controllers;

use Core\BaseController\BaseController;
use Core\Response\HtmlResponse;

class ExampleController extends BaseController
{
    /**
     * Get dashboard as html response
     *
     * @return HtmlResponse
     */
    public function welcome():HtmlResponse
    {
        return $this->view('example.welcome');
    }
}