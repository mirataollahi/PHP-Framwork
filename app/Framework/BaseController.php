<?php

namespace App\Framework;

use App\Response\HtmlResponse;
use App\Response\JsonResponse;
use App\View\ViewEngine;
use Illuminate\Support\Js;

class BaseController
{
    /**
     * Blade view engine
     *
     * @var ViewEngine
     */
    protected ViewEngine $view;

    /**
     * Json Response maker
     *
     * @var JsonResponse
     */
    protected JsonResponse $jsonResponse;


    public function __construct()
    {
        $this->view = new ViewEngine();
        $this->jsonResponse = new JsonResponse();
    }

    /**
     * Create and render view with data parameters
     *
     * @param string $viewAddress View file address with blade structure
     * @param array $viewData View require or optional data array
     * @return HtmlResponse
     */
    public function view(string $viewAddress , array $viewData = []): HtmlResponse
    {
        $renderedView = $this->view->make($viewAddress , $viewData);
        return HtmlResponse::makeWithBlade($renderedView->render());
    }
}