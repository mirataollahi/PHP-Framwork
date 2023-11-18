<?php

namespace Core\Response;

use Core\Contract\ResponseInterface;

class HtmlResponse implements ResponseInterface
{
    /**
     * Text/Html view file address
     *
     * @var string|null
     */
    protected string|null $htmlAddress = null;


    /**
     * Text/Html view file address
     *
     * @var string|null
     */
    protected string|null $renderedBlade = null;


    /**
     * Create new view instance statically
     *
     * @param string|null $htmlAddress html/text view file address
     * @return static
     */
    public static function make(string|null $htmlAddress = null): static
    {
        $viewInstance = new self();
        $viewInstance->htmlAddress = $htmlAddress;
        return $viewInstance;
    }

    /**
     * Create new html response with blade engine
     *
     * @param string $renderedBlade
     * @return static
     */
    public static function makeWithBlade(string $renderedBlade):static
    {
        $viewInstance = new self();
        $viewInstance->renderedBlade = $renderedBlade;
        return $viewInstance;
    }


    /**
     * Generate final text/html output response
     *
     * @return string
     */
    public function generateOutputHtml(): string
    {
        /*
         * When using blade view engine
         */
        if ($this->renderedBlade)
        {
            return $this->renderedBlade;
        }

        /*
         * When using simple html engine
         */
        if ($this->htmlAddress) {

            if (file_exists($this->htmlAddress))
                $htmlContent = file_get_contents($this->htmlAddress);
            else $htmlContent = 'Html file do not exist';
        }

        return "";
    }

    /**
     * Display html response
     *
     * @return void
     */
    public function terminate(): void
    {
        $htmlContent = $this->generateOutputHtml();

        // Set the response headers
        header('Content-Type: text/html');
        // Send the HTML content as the response
        echo $htmlContent;
        exit(0);
    }
}