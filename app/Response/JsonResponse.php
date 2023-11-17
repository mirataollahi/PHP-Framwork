<?php

namespace App\Response;

use App\Contract\ResponseInterface;
use JetBrains\PhpStorm\NoReturn;

class JsonResponse implements ResponseInterface
{
    /**
     * Response status shown result of operation
     *
     * @var bool
     */
    protected bool $status = true;

    /**
     * Response message
     * @var string|null
     */
    protected string|null $message = null;

    /**
     * Response code number with 200 in successful operation
     *
     * @var int
     */
    protected int $code = 200;

    /**
     * Response data in array format
     *
     * @var mixed|array
     */
    protected mixed $data = [];


    /**
     * Use in manual json response
     *
     * @var array|null
     */
    public array|null $manualOutput = null;

    /**
     * Json decode options list
     *
     * @return int
     */
    public function options(): int
    {
        return JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;
    }

    /**
     * Generate successful response base on class properties
     *
     * @param mixed $data
     * @param string|null $message
     * @param int $code
     * @return $this
     */
    public function success(mixed $data, string|null $message = null, int $code = 200): static
    {
        $this->data = $data;
        $this->message = $message;
        $this->code = $code;
        return $this;
    }

    /**
     * Fail response base on the class properties
     *
     * @param mixed $data
     * @param string|null $message
     * @param int $code
     * @return $this
     */
    public function fail(mixed $data, string|null $message = null, int $code = 500): static
    {
        $this->status = false;
        $this->data = $data;
        $this->message = $message;
        $this->code = $code;
        return $this;
    }

    /**
     * Generate array response base on the class properties
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data
        ];
    }

    /**
     * Create json response without resource structure
     *
     * @param array $data
     * @return static
     */
    public static function make(array $data = []): static
    {
        $jsonResponse = new self();
        $jsonResponse->manualOutput = $data;
        return $jsonResponse;
    }

    /**
     * Terminate app and show generated response in json format
     *
     * @return void
     */
    #[NoReturn] public function terminate(): void
    {
        $finalOutput = is_null($this->manualOutput) ? $this->toArray() : $this->manualOutput;
        $jsonData = json_encode($finalOutput);
        header('Content-Type: application/json; charset=utf-8');
        echo $jsonData;
        exit(0);
    }
}
