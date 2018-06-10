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
use ArkEcosystem\Client\Http\Request;
use ArkEcosystem\Client\Http\Response;
use GuzzleHttp\Client;

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
     * The http request instance.
     *
     * @var \ArkEcosystem\Client\Http\Request
     */
    private $request;

    /**
     * Create a new API class instance.
     *
     * @param \ArkEcosystem\Client\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->request    = new Request($connection);
    }

    /**
     * Create and send a HTTP "GET" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    protected function get(string $url, array $params = []): Response
    {
        return $this->request->get($url, $params);
    }

    /**
     * Create and send a HTTP "POST" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    protected function post(string $url, array $params = []): Response
    {
        return $this->request->post($url, $params);
    }

    /**
     * Create and send a HTTP "PUT" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    protected function put(string $url, array $params = []): Response
    {
        return $this->request->put($url, $params);
    }

    /**
     * Create and send a HTTP "PATCH" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    protected function patch(string $url, array $params = []): Response
    {
        return $this->request->patch($url, $params);
    }

    /**
     * Create and send a HTTP "DELETE" request.
     *
     * @param string $url
     * @param array  $params
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    protected function delete(string $url, array $params = []): Response
    {
        return $this->request->delete($url, $params);
    }
}
