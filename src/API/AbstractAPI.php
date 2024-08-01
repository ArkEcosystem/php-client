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

use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Client\Connection;
use ArkEcosystem\Client\Contracts\API;
use ArkEcosystem\Client\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * This is the abstract resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
abstract class AbstractAPI
{
    /**
     * The client .
     *
     * @var ArkClient
     */
    public $client;

    private string $api = 'api';

    /**
     * Create a new API class instance.
     *
     * @param Connection $client
     */
    public function __construct(ArkClient $client)
    {
        $this->client = $client;
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
        $response = $this->client->getHttpClient()->get($this->buildUrl($path), [
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
        $response = $this->client->getHttpClient()->post(
            $this->buildUrl($path),
            ['json' => $parameters]
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    protected function withApi(string $api): self
    {
        $this->api = $api;

        return $this;
    }

    private function buildUrl(string $path): string
    {
        $baseUri = $this->client->getHosts()[$this->api];

        // Reset the API to the default value.
        $this->api = 'api';

        return Str::finish($baseUri, '/').$path;
    }
}
