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
    public function should_get_an_api()
    {
        $connection = $this->getConnection();

        $actual = $connection->api('blocks');

        $this->assertInstanceOf(AbstractAPI::class, $actual);
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
