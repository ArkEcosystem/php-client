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
use ArkEcosystem\Client\Contracts\API;
use ArkEcosystem\Client\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;

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
     * Create a new API class instance.
     *
     * @param \ArkEcosystem\Client\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Send a GET request with query parameters.
     *
     * @param string $path
     * @param array  $query
     *
     * @return array|null|bool
     */
    protected function get(string $path, array $query = [])
    {
        $response = $this->connection->getHttpClient()->get($path, [
            'query' => Arr::dot($query),
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Send a POST request with JSON-encoded parameters.
     *
     * @param string $path
     * @param array  $parameters
     *
     * @return array|null|bool
     */
    protected function post(string $path, array $parameters = [])
    {
        $response = $this->connection->getHttpClient()->post(
            $path,
            ['json' => $parameters]
        );

        return json_decode($response->getBody()->getContents(), true);
    }
}
