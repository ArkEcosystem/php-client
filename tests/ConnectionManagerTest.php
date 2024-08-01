<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\Connection;
use ArkEcosystem\Client\ConnectionManager;

/**
 * @covers \ArkEcosystem\Client\ConnectionManager
 */
class ConnectionManagerTest extends TestCase
{
    /** @test */
    public function it_should_create_a_connection()
    {
        $manager = new ConnectionManager();
        $manager->connect($this->setUpConfig(), 'dummy-connection');

        $this->assertArrayHasKey('dummy-connection', $manager->getConnections());
    }

    /** @test */
    public function it_should_throw_if_a_connection_already_exists()
    {
        $manager = new ConnectionManager();
        $manager->connect($this->setUpConfig(), 'dummy-connection');

        $this->expectException(\InvalidArgumentException::class);

        $manager->connect($this->setUpConfig(), 'dummy-connection');
    }

    /** @test */
    public function it_should_remove_a_connection()
    {
        $manager = new ConnectionManager();
        $manager->connect($this->setUpConfig(), 'dummy-connection');

        $this->assertArrayHasKey('dummy-connection', $manager->getConnections());

        $manager->disconnect('dummy-connection');

        $this->assertArrayNotHasKey('dummy-connection', $manager->getConnections());
    }

    /** @test */
    public function it_should_return_a_connection()
    {
        $manager = new ConnectionManager();
        $manager->connect($this->setUpConfig(), 'dummy-connection');

        $this->assertInstanceOf(Connection::class, $manager->connection('dummy-connection'));
    }

    /** @test */
    public function it_should_throw_if_a_connection_does_not_exists()
    {
        $manager = new ConnectionManager();

        $this->expectException(\InvalidArgumentException::class);

        $manager->connection('dummy-connection');
    }

    /** @test */
    public function it_should_return_the_default_connection()
    {
        $manager = new ConnectionManager();

        $this->assertSame($manager->getDefaultConnection('main'), 'main');
    }

    /** @test */
    public function it_should_set_the_default_connection()
    {
        $manager = new ConnectionManager();
        $manager->setDefaultConnection('dummy-connection');

        $this->assertSame($manager->getDefaultConnection(), 'dummy-connection');
    }

    /** @test */
    public function it_should_return_all_connections()
    {
        $manager = new ConnectionManager();
        $manager->connect($this->setUpConfig(), 'dummy-connection-1');
        $manager->connect($this->setUpConfig(), 'dummy-connection-2');
        $manager->connect($this->setUpConfig(), 'dummy-connection-3');

        $this->assertIsArray($manager->getConnections());
        $this->assertCount(3, $manager->getConnections());
    }

    private function setUpConfig(): array
    {
        return ['host' => $this->host];
    }
}
