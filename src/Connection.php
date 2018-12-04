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

use NumberFormatter;
use RuntimeException;
use GuzzleHttp\Client;
use BadMethodCallException;
use Http\Client\HttpClient;
use Http\Client\Common\Plugin;
use Psr\Cache\CacheItemPoolInterface;
use Http\Discovery\UriFactoryDiscovery;
use Http\Client\Common\HttpMethodsClient;
use ArkEcosystem\Client\HttpClient\Builder;
use ArkEcosystem\Client\HttpClient\Plugin\History;
use ArkEcosystem\Client\HttpClient\Plugin\ExceptionThrower;

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
        $this->responseHistory = new History();
        $this->httpClientBuilder = $httpClientBuilder ?? new Builder();

        $this->httpClientBuilder->addPlugin(new ExceptionThrower());
        $this->httpClientBuilder->addPlugin(new Plugin\HistoryPlugin($this->responseHistory));
        $this->httpClientBuilder->addPlugin(new Plugin\RedirectPlugin());
        $this->httpClientBuilder->addPlugin(new Plugin\BaseUriPlugin(UriFactoryDiscovery::find()->createUri($config['host'])));
        $this->httpClientBuilder->addPlugin(new Plugin\HeaderDefaultsPlugin([
            'User-Agent' => 'ark-php-client (https://github.com/ArkEcosystem/php-client)',
            'Content-Type' => 'application/json',
        ]));

        $this->httpClientBuilder->addHeaderValue('API-Version', 2);
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
     * Create a Github\Client using a HttpClient.
     *
     * @param array                   $config
     * @param \Http\Client\HttpClient $httpClient
     *
     * @return \ArkEcosystem\Client\Connection
     */
    public static function createWithHttpClient(array $config, HttpClient $httpClient): self
    {
        return new static($config, new Builder($httpClient));
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

    /**
     * Add a cache plugin to cache responses locally.
     *
     * @param CacheItemPoolInterface $cache
     * @param array                  $config
     */
    public function addCache(CacheItemPoolInterface $cachePool, array $config = [])
    {
        $this->getHttpClientBuilder()->addCache($cachePool, $config);
    }

    /**
     * Remove the cache plugin.
     */
    public function removeCache(): void
    {
        $this->getHttpClientBuilder()->removeCache();
    }

    /**
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function getLastResponse()
    {
        return $this->responseHistory->getLastResponse();
    }

    /**
     * @return \Http\Client\Common\HttpMethodsClient
     */
    public function getHttpClient(): HttpMethodsClient
    {
        return $this->getHttpClientBuilder()->getHttpClient();
    }

    /**
     * @return \ArkEcosystem\Client\HttpClient\Builder
     */
    public function getHttpClientBuilder(): Builder
    {
        return $this->httpClientBuilder;
    }
}
