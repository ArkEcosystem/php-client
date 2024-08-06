<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Client\ClientManager;

/**
 * @covers \ArkEcosystem\Client\ClientManager
 */
class ClientManagerTest extends TestCase
{
    /** @test */
    public function it_should_create_a_connection()
    {
        $manager = new ClientManager();
        $manager->connect($this->host, 'dummy-client');

        $this->assertArrayHasKey('dummy-client', $manager->getClients());
    }

    /** @test */
    public function it_should_throw_if_a_connection_already_exists()
    {
        $manager = new ClientManager();
        $manager->connect($this->host, 'dummy-client');

        $this->expectException(\InvalidArgumentException::class);

        $manager->connect($this->host, 'dummy-client');
    }

    /** @test */
    public function it_should_remove_a_connection()
    {
        $manager = new ClientManager();
        $manager->connect($this->host, 'dummy-client');

        $this->assertArrayHasKey('dummy-client', $manager->getClients());

        $manager->disconnect('dummy-client');

        $this->assertArrayNotHasKey('dummy-client', $manager->getClients());
    }

    /** @test */
    public function it_should_return_a_connection()
    {
        $manager = new ClientManager();
        $manager->connect($this->host, 'dummy-client');

        $this->assertInstanceOf(ArkClient::class, $manager->client('dummy-client'));
    }

    /** @test */
    public function it_should_throw_if_a_connection_does_not_exists()
    {
        $manager = new ClientManager();

        $this->expectException(\InvalidArgumentException::class);

        $manager->client('dummy-client');
    }

    /** @test */
    public function it_should_return_the_default_connection()
    {
        $manager = new ClientManager();

        $this->assertSame($manager->getDefaultClient('main'), 'main');
    }

    /** @test */
    public function it_should_set_the_default_connection()
    {
        $manager = new ClientManager();
        $manager->setDefaultClient('dummy-client');

        $this->assertSame($manager->getDefaultClient(), 'dummy-client');
    }

    /** @test */
    public function it_should_return_all_connections()
    {
        $manager = new ClientManager();
        $manager->connect($this->host, 'dummy-client-1');
        $manager->connect($this->host, 'dummy-client-2');
        $manager->connect($this->host, 'dummy-client-3');

        $this->assertIsArray($manager->getClients());
        $this->assertCount(3, $manager->getClients());
    }
}
