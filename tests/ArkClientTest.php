<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\API\AbstractAPI;
use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Client\ClientManager;
use GuzzleHttp\HandlerStack;

/**
 * @covers \ArkEcosystem\Client\ArkClient
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
    public function should_accept_hosts_as_an_array()
    {
        $hosts = [
            'api'          => 'https://dwallets-evm.mainsailhq.com/api',
            'transactions' => 'https://dwallets-evm.mainsailhq.com/tx/api',
            'evm'          => 'https://dwallets-evm.mainsailhq.com/evm',
        ];

        $client = new ArkClient($hosts);

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

        new ArkClient($hosts);
    }

    /** @test */
    public function should_accept_custom_handler()
    {
        $handler = HandlerStack::create();

        $connection = new ArkClient(hostOrHosts: $this->host, handler: $handler);

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
     * @return ArkClient
     */
    private function getClient(): ArkClient
    {
        return (new ClientManager())->connect($this->host);
    }
}
