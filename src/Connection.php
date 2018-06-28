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

use ArkEcosystem\Client\HttpClient\Builder;
use ArkEcosystem\Client\HttpClient\Plugin\ExceptionThrower;
use ArkEcosystem\Client\HttpClient\Plugin\History;
use GuzzleHttp\Client;
use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin;
use Http\Client\HttpClient;
use Http\Discovery\UriFactoryDiscovery;
use NumberFormatter;
use Psr\Cache\CacheItemPoolInterface;
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
        $this->config            = $config;
        $this->responseHistory   = new History();
        $this->httpClientBuilder = $httpClientBuilder ?? new Builder();

        $this->httpClientBuilder->addPlugin(new ExceptionThrower());
        $this->httpClientBuilder->addPlugin(new Plugin\HistoryPlugin($this->responseHistory));
        $this->httpClientBuilder->addPlugin(new Plugin\RedirectPlugin());
        // TODO: the AddHostPlugin plugin currently takes no effect, figure out why
        $this->httpClientBuilder->addPlugin(new Plugin\AddHostPlugin(UriFactoryDiscovery::find()->createUri($config['host'])));
        $this->httpClientBuilder->addPlugin(new Plugin\HeaderDefaultsPlugin([
            'User-Agent' => 'ark-php-client (https://github.com/ArkEcosystem/php-client)',
        ]));

        $this->httpClientBuilder->addHeaderValue('API-Version', $config['version']);
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
        } catch (InvalidArgumentException $e) {
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
    public static function createWithHttpClient(array $config, HttpClient $httpClient): Connection
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
        $formatter = new NumberFormatter('en', NumberFormatter::SPELLOUT);
        $version   = ucfirst($formatter->format($this->config['version']));
        $class     = "ArkEcosystem\\Client\\API\\{$version}\\{$name}";

        if (!class_exists($class)) {
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
    public function removeCache()
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
     * @return HttpMethodsClient
     */
    public function getHttpClient()
    {
        return $this->getHttpClientBuilder()->getHttpClient();
    }

    /**
     * @return Builder
     */
    protected function getHttpClientBuilder()
    {
        return $this->httpClientBuilder;
    }
}
