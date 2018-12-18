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

namespace ArkEcosystem\Client\API;

use GuzzleHttp\Client;
use ArkEcosystem\Client\Connection;
use ArkEcosystem\Client\Http\Request;
use ArkEcosystem\Client\Contracts\API;
use ArkEcosystem\Client\HttpClient\Message\ResponseMediator;

/**
 * This is the abstract resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
abstract class AbstractAPI
{
    /**
     * The client connection.
     *
     * @var \ArkEcosystem\Client\Connection
     */
    public $connection;

    /**
     * The requested offset.
     *
     * @var null|int
     */
    protected $offset;

    /**
     * Number of items per request.
     *
     * @var null|int
     */
    protected $limit;

    /**
     * Create a new API class instance.
     *
     * @param \ArkEcosystem\Client\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * {@inheritdoc}
     */
    public function setOffset(int $offset): API
    {
        $this->offset = (null === $offset ? $offset : (int) $offset);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * {@inheritdoc}
     */
    public function setLimit(int $limit): API
    {
        $this->limit = (null === $limit ? $limit : (int) $limit);

        return $this;
    }

    /**
     * Send a GET request with query parameters.
     *
     * @param string $path
     * @param array  $parameters
     *
     * @return array|string
     */
    protected function get(string $path, array $parameters = [])
    {
        if (null !== $this->offset && ! isset($parameters['offset'])) {
            $parameters['offset'] = $this->offset;
        }

        if (null !== $this->limit && ! isset($parameters['limit'])) {
            $parameters['limit'] = $this->limit;
        }

        if (count($parameters) > 0) {
            $path .= '?'.http_build_query($parameters);
        }

        $response = $this->connection->getHttpClient()->get($this->getUri($path));

        return ResponseMediator::getContent($response);
    }

    /**
     * Send a POST request with JSON-encoded parameters.
     *
     * @param string $path
     * @param array  $parameters
     *
     * @return array|string
     */
    protected function post(string $path, array $parameters = [])
    {
        $response = $this->connection->getHttpClient()->post(
            $this->getUri($path),
            [],
            $this->createJsonBody($parameters)
        );

        return ResponseMediator::getContent($response);
    }

    /**
     * Get the URI used for the request.
     *
     * @param string $path
     *
     * @return string
     */
    private function getUri(string $path): string
    {
        return '/' !== $path[0] ? "/{$path}" : $path;
    }

    /**
     * Create a JSON encoded version of an array of parameters.
     *
     * @param array $parameters Request parameters
     *
     * @return null|string
     */
    protected function createJsonBody(array $parameters): ?string
    {
        return (count($parameters) === 0)
            ? null
            : json_encode($parameters, empty($parameters) ? JSON_FORCE_OBJECT : 0);
    }
}
