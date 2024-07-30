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

use ArkEcosystem\Client\ArkClientBuilder;
use ArkEcosystem\Client\ArkClient;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase;

/**
 * This is the builder test class.
 *
 * @covers \ArkEcosystem\Client\ArkClientBuilder
 */
class ArkClientBuilderTest extends TestCase
{
    private array $hosts = [
        'api' => 'https://dwallets-evm.mainsailhq.com/api',
        'transactions' => 'https://dwallets-evm.mainsailhq.com/tx',
        'evm' => 'https://dwallets-evm.mainsailhq.com/evm'
    ];

    /** @test */
    public function it_should_create_a_client_with_hosts()
    {
        $client = ArkClientBuilder::withHosts($this->hosts)->create();

        $this->assertInstanceOf(ArkClient::class, $client);
        $this->assertEquals($this->hosts, $client->hosts);
    }

    /** @test */
    public function it_should_accept_custom_client_config()
    {
        $clientConfig = ['timeout' => 2.0];

        $client = ArkClientBuilder::withHosts($this->hosts)
            ->withClientConfig($clientConfig)
            ->create();

        $this->assertInstanceOf(ArkClient::class, $client);
        $this->assertArrayHasKey('timeout', $client->getHttpClient()->getConfig());
        $this->assertEquals(2.0, $client->getHttpClient()->getConfig('timeout'));
    }

    /** @test */
    public function it_should_accept_custom_handler()
    {
        $handler = HandlerStack::create();

        $client = ArkClientBuilder::withHosts($this->hosts)
            ->withHandler($handler)
            ->create();

        $this->assertInstanceOf(ArkClient::class, $client);
        $this->assertSame($handler, $client->getHttpClient()->getConfig('handler'));
    }

    /** @test */
    public function it_should_create_a_client_with_all_parameters()
    {
        $clientConfig = ['timeout' => 2.0];
        $handler = HandlerStack::create();

        $client = ArkClientBuilder::withHosts($this->hosts)
            ->withClientConfig($clientConfig)
            ->withHandler($handler)
            ->create();

        $this->assertInstanceOf(ArkClient::class, $client);
        $this->assertEquals($this->hosts, $client->hosts);
        $this->assertArrayHasKey('timeout', $client->getHttpClient()->getConfig());
        $this->assertEquals(2.0, $client->getHttpClient()->getConfig('timeout'));
        $this->assertSame($handler, $client->getHttpClient()->getConfig('handler'));
    }
}
