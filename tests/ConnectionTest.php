<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\ClientManager;
use ArkEcosystem\Client\Connection;
use GuzzleHttp\HandlerStack;

/**
 * @covers \ArkEcosystem\Client\Connection
 */
class ConnectionTest extends TestCase
{
    /** @test */
    public function should_accept_hosts_as_an_array()
    {
        $hosts = [
            'api'          => 'https://dwallets-evm.mainsailhq.com/api',
            'transactions' => 'https://dwallets-evm.mainsailhq.com/tx/api',
            'evm'          => 'https://dwallets-evm.mainsailhq.com/evm',
        ];

        $client = new Connection($hosts);

        $this->assertSame($hosts, $client->getHosts());
    }

    /** @test */
    public function does_not_accepts_hosts_array_without_api()
    {
        $hosts = [
            'transactions' => 'https://dwallets-evm.mainsailhq.com/tx/api',
            'evm'          => 'https://dwallets-evm.mainsailhq.com/evm',
        ];

        $this->expectException(\InvalidArgumentException::class);

        new Connection($hosts);
    }

    /** @test */
    public function should_accept_custom_handler()
    {
        $handler = HandlerStack::create();

        $connection = new Connection(hostOrHosts: $this->host, handler: $handler);

        $this->assertSame($handler, $connection->getHttpClient()->getConfig('handler'));
    }

    /** @test */
    public function should_set_host()
    {
        $client = $this->getClient();

        $newHost = 'https://new-host.com/api';
        $client->setHost($newHost, 'api');

        $this->assertSame($newHost, $client->getHosts()['api']);
    }

    /** @test */
    public function should_throw_exception_if_host_type_is_invalid()
    {
        $client = $this->getClient();

        $this->expectException(\InvalidArgumentException::class);

        $client->setHost('https://new-host.com/api', 'other');
    }

    /**
     * Get a new client instance.
     *
     * @return Connection
     */
    private function getClient(): Connection
    {
        return (new ClientManager())->connect($this->host);
    }
}
