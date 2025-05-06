<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\API\AbstractAPI;
use ArkEcosystem\Client\API\Blocks;
use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Client\ClientManager;
use GuzzleHttp\HandlerStack;

/**
 * @covers \ArkEcosystem\Client\ArkClient
 */
class ArkClientTest extends TestCase
{
    /** @test */
    public function should_call_an_api_if_exists()
    {
        $client = new ArkClient(['api' => $this->host]);

        $actual = $client->blocks();

        $this->assertInstanceOf(Blocks::class, $actual);
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

        $this->assertSame($hosts, $client->connection->getHosts());
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

        $client = new ArkClient(hostOrHosts: $this->host, handler: $handler);

        // `getConfig` is deprecated but likely never removed: https://github.com/guzzle/guzzle/issues/3114#issuecomment-1627228395
        $this->assertSame($handler, $client->connection->getHttpClient()->getConfig('handler'));
    }
}
