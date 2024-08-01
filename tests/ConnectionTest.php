<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\API\AbstractAPI;
use ArkEcosystem\Client\Connection;
use ArkEcosystem\Client\ConnectionManager;
use GuzzleHttp\HandlerStack;

/**
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
    public function should_get_an_api()
    {
        $connection = $this->getConnection();

        $actual = $connection->api('blocks');

        $this->assertInstanceOf(AbstractAPI::class, $actual);
    }

    /** @test */
    public function should_accept_custom_handler()
    {
        $handler = HandlerStack::create();

        $connection = new Connection(['host' => $this->host], $handler);

        $this->assertSame($handler, $connection->getHttpClient()->getConfig('handler'));
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
        ]);
    }
}
