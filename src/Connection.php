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
     * @param array                                   $config
     * @param \ArkEcosystem\Client\HttpClient\Builder $config
     */
    public function __construct(array $config, Builder $httpClientBuilder = null)
    {
        $this->config = $config;

        $this->client = new Client([
            'base_uri' => $config['host'],
            'headers' => [
                'User-Agent' => 'ark-php-client (https://github.com/ArkEcosystem/php-client)',
                'Content-Type' => 'application/json',
                'API-Version' => 2,
            ]
        ]));
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
