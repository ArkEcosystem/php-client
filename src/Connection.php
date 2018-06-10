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

use GrahamCampbell\GuzzleFactory\GuzzleFactory;
use GuzzleHttp\Client;
use NumberFormatter;

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
    private $config;

    /**
     * The Guzzle client.
     *
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * Make a new connection instance.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;

        $this->configure();
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

        return new $class($this, $this->makeClient());
    }

    /**
     * Make the guzzle client instance.
     *
     * @return \GuzzleHttp\Client
     */
    private function makeClient(): Client
    {
        if (!$this->client) {
            $this->client = GuzzleFactory::make([
                'base_uri' => $this->config['host'],
                'headers'  => [
                    'nethash'     => array_get($this->config, 'nethash'),
                    'version'     => array_get($this->config, 'version'),
                    'port'        => 1,
                    'API-Version' => $this->config['api_version'],
                ],
            ]);
        }

        return $this->client;
    }

    /**
     * Configure the connection based on the server.
     */
    private function configure(): void
    {
        if (1 === $this->config['api_version']) {
            $response = $this->api('loader')->autoconfigure();
            $response = json_decode($response->getBody()->getContents());

            $this->config['nethash'] = $response->network->nethash;
            $this->config['version'] = $response->network->version;
        } else {
            $response = $this->api('node')->configuration();
            $response = json_decode($response->getBody()->getContents());

            $this->config['nethash'] = $response->data->nethash;
            $this->config['version'] = $response->data->version;
        }
    }
}
