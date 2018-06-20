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

use ArkEcosystem\Client\Connection;
use GrahamCampbell\GuzzleFactory\GuzzleFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

/**
 * This is the http request class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Request
{
    /**
     * Create a new request instance.
     *
     * @param \ArkEcosystem\Client\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Create and send a HTTP "GET" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function get(string $url, array $query = []): Response
    {
        return $this->send('get', $url, compact('query'));
    }

    /**
     * Create and send a HTTP "POST" request.
     *
     * @param string $url
     * @param array  $formParams
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function post(string $url, array $formParams = []): Response
    {
        return $this->send('post', $url, ['form_params' => $formParams]);
    }

    /**
     * Create and send a HTTP "PUT" request.
     *
     * @param string $url
     * @param array  $formParams
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function put(string $url, array $formParams = []): Response
    {
        return $this->send('put', $url, ['form_params' => $formParams]);
    }

    /**
     * Create and send a HTTP "PATCH" request.
     *
     * @param string $url
     * @param array  $formParams
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function patch(string $url, array $formParams = []): Response
    {
        return $this->send('patch', $url, ['form_params' => $formParams]);
    }

    /**
     * Create and send a HTTP "DELETE" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function delete(string $url, array $params = []): Response
    {
        return $this->send('delete', $url, compact('query'));
    }

    /**
     * Create and send a HTTP request.
     *
     * @param string $method
     * @param string $url
     * @param array  $params
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    private function send(string $method, string $path, array $params): Response
    {
        $client = $this->makeClient();

        $request = new GuzzleRequest(strtoupper($method), $path);

        return new Response($client->send($request, $params));
    }

    /**
     * Make the Guzzle client instance.
     *
     * @return \GuzzleHttp\Client
     */
    private function makeClient(): Client
    {
        return GuzzleFactory::make([
            'base_uri' => $this->connection->config->get('host'),
            'headers'  => [
                'API-Version' => $this->connection->config->get('api_version'),
            ],
        ]);
    }
}
