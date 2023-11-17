<?php

namespace App\Controllers;

use App\Framework\BaseController;
use App\Response\HtmlResponse;

class DashboardController extends BaseController
{
    /**
     * Get dashboard as html response
     *
     * @return HtmlResponse
     */
    public function index():HtmlResponse
    {
        return $this->view('dashboard.table');
    }
}