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

namespace ArkEcosystem\Client;

use BadMethodCallException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use RuntimeException;

/**
 * This is the connection class.
 *
 * @autor Brian Faust <brian@ark.io>
 */
class ArkClient
{
    /**
     * The Guzzle Client instance.
     *
     * @var Client
     */
    public $httpClient;

    /**
     * The hosts to connect to.
     *
     * @var array{
     *  api: string,
     *  transactions: string|null,
     *  evm: string|null
     * }
     */
    public array $hosts;

    /**
     * Make a new connection instance.
     *
     * @param string|array{
     *  api: string,
     *  transactions: string|null,
     *  evm: string|null
     * } $hostOrHosts
     * @param array $clientConfig
     * @param HandlerStack $handler
     *
     * @throws InvalidArgumentException if $hostOrHosts is an array and does not have the required format
     */
    public function __construct(array|string $hostOrHosts, array $clientConfig = [], HandlerStack $handler = null)
    {
        $this->validateHosts($hostOrHosts);

        if (is_array($hostOrHosts)) {
            $baseUri = $hostOrHosts['api'];
        } else {
            $baseUri = $hostOrHosts;
        }

        $options = [
            ...$clientConfig,
            'base_uri' => Str::finish($baseUri, '/'),
            'headers'  => [
                ...Arr::get($clientConfig, 'headers', []),
                'Content-Type' => 'application/json',
            ],
        ];

        if ($handler instanceof HandlerStack) {
            $options['handler'] = $handler;
        }

        $this->httpClient = new Client($options);
    }

    /**
     * Validate the hosts array format.
     *
     * @param string|array $hostOrHosts
     *
     * @throws InvalidArgumentException if the hosts array does not have the required format
     */
    private function validateHosts(array|string $hostOrHosts): void
    {
        if (is_array($hostOrHosts) && !array_key_exists('api', $hostOrHosts)) {
            throw new \InvalidArgumentException(sprintf('The hosts array must contain the key "api".'));
        }
    }

    /**
     * Handle dynamic method calls into the connection.
     *
     * @param string $name
     * @param mixed  $args
     *
     * @throws BadMethodCallException
     *
     * @return ApiInterface
     */
    public function __call($name, $args)
    {
        try {
            return $this->api($name);
        } catch (RuntimeException $e) {
            throw new BadMethodCallException(sprintf('Undefined method called: "%s"', $name));
        }
    }

    /**
     * Make a new resource instance.
     *
     * @param string $name
     *
     * @return API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $name  = ucfirst($name);
        $class = "ArkEcosystem\\Client\\API\\{$name}";

        if (! class_exists($class)) {
            throw new RuntimeException("Class [$class] does not exist.");
        }

        return new $class($this);
    }

    /**
     * Get the Guzzle client instance.
     *
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }
}
