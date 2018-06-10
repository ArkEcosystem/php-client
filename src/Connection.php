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

use GuzzleHttp\Client;
use NumberFormatter;
use RuntimeException;

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
     * @var array
     */
    private $config = ['api_version' => 1];

    /**
     * Make a new connection instance.
     *
     * @param string $host
     */
    public function __construct(string $host)
    {
        $this->config['host'] = $host;

        $this->configure();
    }

    /**
     * Set the connection API version on the fly.
     *
     * @param string $version
     *
     * @return \ArkEcosystem\Client\Connection
     */
    public function version(string $version): self
    {
        $this->config['api_version'] = $version;

        return $this;
    }

    /**
     * Get a configuration value.
     *
     * @param string     $key
     * @param null|mixed $default
     *
     * @return mixed
     */
    public function config(string $key, $default = null)
    {
        return array_get($this->config, $key, $default);
    }

    /**
     * Make a new resource instance.
     *
     * @param string $name
     *
     * @return \ArkEcosystem\Client\API\AbstractResource
     */
    public function api(string $name): API\AbstractResource
    {
        $formatter = new NumberFormatter('en', NumberFormatter::SPELLOUT);
        $version   = ucfirst($formatter->format($this->config['api_version']));
        $class     = "ArkEcosystem\\Client\\API\\{$version}\\{$name}";

        if (!class_exists($class)) {
            throw new RuntimeException("Class [$class] does not exist.");
        }

        return new $class($this);
    }

    /**
     * Configure the connection based on the server.
     */
    private function configure(): void
    {
        if (1 === $this->config['api_version']) {
            $response                = $this->api('loader')->autoconfigure();
            $response                = json_decode($response->getBody()->getContents());
            $this->config['nethash'] = $response->network->nethash;

            $response                = $this->api('peers')->version();
            $response                = json_decode($response->getBody()->getContents());
            $this->config['version'] = $response->version;
        } else {
            $response = $this->api('node')->configuration();
            $response = json_decode($response->getBody()->getContents());

            $this->config['nethash'] = $response->data->nethash;
            $this->config['version'] = $response->data->version;
        }
    }
}
