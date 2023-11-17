<?php

namespace App\Response;

use App\Exceptions\ExceptionHandler;
use App\Exceptions\ViewFileNotFoundException;
use Exception;

class ResponseGenerator
{

    /**
     * Application running response or result
     *
     * @var mixed
     */
    protected mixed $response;



    public function __construct(mixed $response)
    {
        $this->response = $response;
    }

    /**
     * Make application related response
     *
     * @return void
     */
    public function make():void
    {
        try {
            if (is_array($this->response))
                $this->response = JsonResponse::make($this->response);

            if ($this->response instanceof JsonResponse || $this->response instanceof HtmlResponse)
            {
                $this->response->terminate();
            }

            if (is_string($this->response) || is_numeric($this->response)|| is_bool($this->response) || is_integer($this->response))
            {
                echo $this->response;
                exit(0);
            }

            if (is_object($this->response))
            {
                echo "Object Response";
                exit(0);
            }
        }catch (Exception $exception)
        {
            echo $exception->getMessage();
            exit(0);
        }


    }
}