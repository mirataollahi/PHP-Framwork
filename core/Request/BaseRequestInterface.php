<?php

namespace Core\Request;

use Core\ServiceProvider\ServiceInterface;

/**
 * Interface BaseRequestInterface
 */
interface BaseRequestInterface extends ServiceInterface
{
    /**
     * Get the value of a GET parameter.
     *
     * @param string|null $indexName The index name of the parameter
     * @return string|null The value of the parameter, or null if not present
     */
    public function get(?string $indexName): ?string;

    /**
     * Get the value of a POST parameter.
     *
     * @param string|null $indexName The index name of the parameter
     * @return string|null The value of the parameter, or null if not present
     */
    public function post(?string $indexName): ?string;

    /**
     * Get the value of a request input parameter (GET or POST).
     *
     * @param string|null $indexName The index name of the parameter
     * @return string|null The value of the parameter, or null if not present
     */
    public function input(?string $indexName): ?string;

    /**
     * Get the request data as an array.
     *
     * @return array The request data as an array
     */
    public function toArray(): array;

    /**
     * Get the request data as an array, excluding specific indexes.
     *
     * @param array $indexes The indexes to exclude from the array
     * @return array The filtered request data as an array
     */
    public function except(array $indexes = []): array;

    /**
     * Magic method to get the value of a request parameter as a property.
     *
     * @param string $name The name of the request parameter
     * @return string|null The value of the request parameter as a property, or null if not present
     */
    public function __get(string $name): ?string;

    /**
     * Get the current URL.
     *
     * @param bool $withScheme Whether to include the scheme in the URL (default: true)
     * @return string|null The current URL
     */
    public function url(bool $withScheme = true): ?string;

    /**
     * Get the current URI.
     *
     * @return string|null The current URI
     */
    public function uri(): ?string;

    /**
     * Get the full URL including the query string.
     *
     * @param bool $withScheme Whether to include the scheme in the URL (default: true)
     * @return string The full URL
     */
    public function fullUrl(bool $withScheme = true): string;

    /**
     * Check if the current request is using HTTPS.
     *
     * @return bool Whether the current request is using HTTPS
     */
    public function isHttps(): bool;

    /**
     * Get the scheme (HTTP or HTTPS) of the current request.
     *
     * @return string The scheme of the current request
     */
    public function scheme(): string;
}