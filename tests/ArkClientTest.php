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
use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Client\ClientManager;
use GuzzleHttp\HandlerStack;

/**
 * This is the connection manager test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Client\Connection
 */
class ArkClientTest extends TestCase
{
    /** @test */
    public function it_should_return_an_api()
    {
        $connection = $this->getClient();

        $this->assertInstanceOf(AbstractAPI::class, $connection->api('blocks'));
    }

    /** @test */
    public function should_call_on_api_if_exists()
    {
        $connection = $this->getClient();

        $actual = $connection->blocks();

        $this->assertInstanceOf(AbstractAPI::class, $actual);
    }

    /** @test */
    public function should_call_and_throw_if_not_exists()
    {
        $connection = $this->getClient();

        $this->expectException(\BadMethodCallException::class);

        $connection->dummy();
    }

    /** @test */
    public function should_get_an_api()
    {
        $connection = $this->getClient();

        $actual = $connection->api('blocks');

        $this->assertInstanceOf(AbstractAPI::class, $actual);
    }

    /** @test */
    public function should_accept_custom_handler()
    {
        $handler = HandlerStack::create();

        $connection = new ArkClient(hostOrHosts: $this->host, handler: $handler);

        $this->assertSame($handler, $connection->getHttpClient()->getConfig('handler'));
    }

    /**
     * Get a new client instance.
     *
     * @return ArkClient
     */
    private function getClient(): ArkClient
    {
        return (new ClientManager())->connect($this->host);
    }
}
