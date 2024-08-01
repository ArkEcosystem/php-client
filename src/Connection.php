<?php

declare(strict_types=1);

namespace ArkEcosystem\Client;

use BadMethodCallException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Str;
use RuntimeException;

class Connection
{
    /**
     * The Guzzle Client instance.
     *
     * @var Client
     */
    public $httpClient;

    /**
     * Make a new connection instance.
     *
     * @param array                    $config
     * @param HandlerStack $handler
     */
    public function __construct(array $config, HandlerStack $handler = null)
    {
        $options = [
            'base_uri' => Str::finish($config['host'], '/'),
            'headers'  => [
                'Content-Type' => 'application/json',
            ],
        ];

        if ($handler instanceof HandlerStack) {
            $options['handler'] = $handler;
        }

        $this->httpClient = new Client($options);
    }

    /**
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
