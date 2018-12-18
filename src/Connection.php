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

use RuntimeException;
use GuzzleHttp\Client;
use BadMethodCallException;
use GuzzleHttp\HandlerStack;

/**
 * This is the connection class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Connection
{
    /**
     * The connection configuration.
     *
     * @var \ArkEcosystem\Client\Config
     */
    public $config;

    /**
     * Make a new connection instance.
     *
     * @param array $config
     * @param \GuzzleHttp\HandlerStack $handler
     */
    public function __construct(array $config, HandlerStack $handler = null)
    {
        $this->config = $config;

        $options = [
            'base_uri' => $config['host'],
            'headers' => [
                'User-Agent' => 'ark-php-client (https://github.com/ArkEcosystem/php-client)',
                'Content-Type' => 'application/json',
                'API-Version' => 2,
            ],
        ];

        if ($handler) {
            $options['handler'] = $handler;
        }

        $this->client = new Client($options);
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
     * @return \ArkEcosystem\Client\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $name = ucfirst($name);
        $class = "ArkEcosystem\\Client\\API\\{$name}";

        if (! class_exists($class)) {
            throw new RuntimeException("Class [$class] does not exist.");
        }

        return new $class($this);
    }
}
