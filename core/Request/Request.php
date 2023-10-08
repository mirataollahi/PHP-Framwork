<?php

namespace Core\Request;

use Core\ServiceProvider\ServiceInterface;

class Request implements BaseRequestInterface
{

    /**
     * The request inputs or body with array type
     *
     * @var array
     */
    private array $parameters = [];

    /**
     * Add request inputs or body to parameters
     *
     */
    public function __construct()
    {
        $this->parameters = $_REQUEST;
    }

    /**
     * Get an input form request parameters . if the index do not exist return null
     *
     * @param string|null $indexName
     * @return string|null
     */
    public function get(?string $indexName): ?string
    {
        return $this->parameters[$indexName] ?? null;
    }

    /**
     * Get an input form request parameters with post method sent . if the index do not exist return null
     *
     * @param string|null $indexName
     * @return string|null
     */
    public function post(?string $indexName): ?string
    {
        return $this->parameters[$indexName] ?? null;
    }

    /**
     * Get the value of a POST parameter.
     *
     * @param string|null $indexName The index name of the parameter
     * @return string|null The value of the parameter, or null if not present
     */
    public function input(?string $indexName): ?string
    {
        return $this->parameters[$indexName] ?? null;
    }

    /**
     * The method return request inputs or body as array
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->parameters;
    }

    /**
     * Get the request data as an array, excluding specific indexes.
     *
     * @param array $indexes The indexes to exclude from the array
     * @return array The filtered request data as an array
     */
    public function except(array $indexes = []): array
    {
        return array_diff_key($this->parameters, array_flip($indexes));
    }

    /**
     * Magic method to get the value of a request parameter as a property.
     *
     * @param string $name The name of the request parameter
     * @return string|null The value of the request parameter as a property, or null if not present
     */
    public function __get(string $name): ?string
    {
        return $this->parameters[$name] ?? null;
    }

    /**
     * Get the current URL.
     *
     * @param bool $withScheme Whether to include 'https://' in the URL (default: true)
     * @return string|null The current URL
     */
    public function url(bool $withScheme = true): ?string
    {
        $protocol = $withScheme ? $this->scheme() : null ;
        return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    /**
     * Get the current URI.
     *
     * @return string|null The current URI
     */
    public function uri(): ?string
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * Get current full request , url and uri
     *
     * @param bool $withScheme
     * @return string
     */
    public function fullUrl(bool $withScheme = true): string
    {
        return $this->url($withScheme) . $this->uri();
    }

    /**
     * Check if the current request scheme is using HTTPS.
     *
     * @return bool Whether the current request is using HTTPS
     */
    public function isHttps(): bool
    {
        return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
    }

    /**
     * Get current request url scheme
     *
     * @return string
     */
    public function scheme(): string
    {
        return $this->isHttps() ? 'https://' : 'http://';
    }


}