<?php

declare(strict_types=1);

namespace ArkEcosystem\Client;

use BadMethodCallException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Arr;
use RuntimeException;

/**
 * This is the connection class.
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
    private array $hosts;

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
            $this->hosts = $hostOrHosts;
        } else {
            $this->hosts = ['api' => $hostOrHosts];
        }

        $options = [
            ...$clientConfig,
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
     * Set the host for the given type.
     *
     * @param string $host
     * @param string $type
     *
     * @throws InvalidArgumentException if the type is not 'api', 'transactions', or 'evm'
     */
    public function setHost(string $host, string $type): void
    {
        if (! in_array($type, ['api', 'transactions', 'evm'], true)) {
            throw new \InvalidArgumentException('Invalid host type.');
        }

        $this->hosts[$type] = $host;
    }

    /**
     * @return array{
     *  api: string,
     *  transactions: string|null,
     *  evm: string|null
     * }
     */
    public function getHosts(): array
    {
        return $this->hosts;
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
        $name  = $name === 'evm' ? 'EVM' : ucfirst($name);
        
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

    /**
     * Validate the hosts array format.
     *
     * @param string|array $hostOrHosts
     *
     * @throws InvalidArgumentException if the hosts array does not have the required format
     */
    private function validateHosts(array|string $hostOrHosts): void
    {
        if (is_array($hostOrHosts) && ! array_key_exists('api', $hostOrHosts)) {
            throw new \InvalidArgumentException(sprintf('The hosts array must contain the key "api".'));
        }
    }
}
