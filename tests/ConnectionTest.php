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

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\API\AbstractAPI;
use ArkEcosystem\Client\Connection;
use ArkEcosystem\Client\ConnectionManager;
use ArkEcosystem\Client\HttpClient\Builder;
use Cache\Adapter\PHPArray\ArrayCachePool;
use GuzzleHttp\Psr7\Request;
use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin\CachePlugin;
use Psr\Http\Message\ResponseInterface;

/**
 * This is the connection manager test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Client\Connection
 */
class ConnectionTest extends TestCase
{
    /** @test */
    public function it_should_return_an_api()
    {
        $connection = $this->getConnection();

        $this->assertInstanceOf(AbstractAPI::class, $connection->api('blocks'));
    }

    /** @test */
    public function should_call_on_api_if_exists()
    {
        $connection = $this->getConnection();

        $actual = $connection->blocks();

        $this->assertInstanceOf(AbstractAPI::class, $actual);
    }

    /** @test */
    public function should_call_and_throw_if_not_exists()
    {
        $connection = $this->getConnection();

        $this->expectException(\BadMethodCallException::class);

        $connection->dummy();
    }

    /** @test */
    public function should_create_with_http_client()
    {
        $httpClient = $this
            ->getMockBuilder(\Http\Client\HttpClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $actual = Connection::createWithHttpClient([
            'host'    => $this->host,
            'version' => 1,
        ], $httpClient);

        $this->assertInstanceOf(Connection::class, $actual);
    }

    /** @test */
    public function should_get_an_api()
    {
        $connection = $this->getConnection();

        $actual = $connection->api('blocks');

        $this->assertInstanceOf(AbstractAPI::class, $actual);
    }

    /** @test */
    public function should_add_the_cache()
    {
        $connection = $this->getConnection();
        $connection->addCache(new ArrayCachePool());

        $actual = $connection->getHttpClientBuilder()->getCache();

        $this->assertInstanceOf(CachePlugin::class, $actual);
    }

    /** @test */
    public function should_remove_the_cache()
    {
        $connection = $this->getConnection();
        $connection->addCache(new ArrayCachePool());

        $actual = $connection->getHttpClientBuilder()->getCache();
        $this->assertInstanceOf(CachePlugin::class, $actual);

        $connection->removeCache();

        $actual = $connection->getHttpClientBuilder()->getCache();
        $this->assertNull($actual);
    }

    /** @test */
    public function should_get_the_last_response()
    {
        $connection = $this->getConnection();
        $connection->responseHistory->addSuccess(new Request('GET', '/'), $this->getResponse());

        $actual = $connection->getLastResponse();

        $this->assertInstanceOf(ResponseInterface::class, $actual);
    }

    /** @test */
    public function should_get_the_http_client()
    {
        $actual = $this->getConnection()->getHttpClient();

        $this->assertInstanceOf(HttpMethodsClient::class, $actual);
    }

    /** @test */
    public function should_get_the_http_client_builder()
    {
        $actual = $this->getConnection()->getHttpClientBuilder();

        $this->assertInstanceOf(Builder::class, $actual);
    }

    /**
     * Get a new connection instance.
     *
     * @return Connection
     */
    private function getConnection(): Connection
    {
        return (new ConnectionManager())->connect([
            'host'        => $this->host,
            'version'     => 1,
        ]);
    }
}
