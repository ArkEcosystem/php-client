<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Client.
 *
 * (c) Ark Ecosystem <info@ark.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ArkEcosystem\Client\Http;

use GuzzleHttp\Psr7\Response as GuzzleResponse;

/**
 * This is the http response class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Response
{
    /**
     * Create a new response instance.
     *
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function __construct(GuzzleResponse $response)
    {
        $this->response = $response;
    }

    /**
     * Return the raw response body when treated as a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->body();
    }

    /**
     * Call a method on the Guzzle response.
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call(string $method, array $args)
    {
        return $this->response->{$method}(...$args);
    }

    /**
     * Get the raw response body.
     *
     * @return string
     */
    public function body(): string
    {
        return (string) $this->response->getBody();
    }

    /**
     * Get the JSON decoded response body.
     *
     * @return array
     */
    public function json(): array
    {
        return json_decode($this->body(), true);
    }

    /**
     * Get the value for the given header.
     *
     * @param string $header
     *
     * @return string
     */
    public function header(string $header): ?string
    {
        return $this->response->getHeaderLine($header);
    }

    /**
     * Get the status code.
     *
     * @return int
     */
    public function status(): int
    {
        return $this->response->getStatusCode();
    }

    /**
     * Determine if the status code indicates a success.
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->status() >= 200 && $this->status() < 300;
    }

    /**
     * Determine if the status code indicates a client.
     *
     * @return bool
     */
    public function isClientError(): bool
    {
        return $this->status() >= 400 && $this->status() < 500;
    }

    /**
     * Determine if the status code indicates a server error.
     *
     * @return bool
     */
    public function isServerError(): bool
    {
        return $this->status() >= 500;
    }
}
