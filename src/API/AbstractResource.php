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

use ArkEcosystem\Client\Connection;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * This is the abstract resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
abstract class AbstractResource
{
    /**
     * The client connection.
     *
     * @var \ArkEcosystem\Client\Connection
     */
    private $connection;

    /**
     * The Guzzle client.
     *
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * Create a new API class instance.
     *
     * @param \ArkEcosystem\Client\Connection $connection
     * @param \GuzzleHttp\Client              $client
     */
    public function __construct(Connection $connection, Client $client)
    {
        $this->connection = $connection;
        $this->client     = $client;
    }

    /**
     * Create and send a HTTP "GET" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function get(string $url, array $params = []): Response
    {
        return $this->client->get($url, $params);
    }

    /**
     * Create and send a HTTP "POST" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function post(string $url, array $params = []): Response
    {
        return $this->client->post($url, $params);
    }

    /**
     * Create and send a HTTP "PUT" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function put(string $url, array $params = []): Response
    {
        return $this->client->put($url, $params);
    }

    /**
     * Create and send a HTTP "PATCH" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function patch(string $url, array $params = []): Response
    {
        return $this->client->patch($url, $params);
    }

    /**
     * Create and send a HTTP "DELETE" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function delete(string $url, array $params = []): Response
    {
        return $this->client->delete($url, $params);
    }
}
