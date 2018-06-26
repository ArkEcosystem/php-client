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
use ArkEcosystem\Client\Config;
use ArkEcosystem\Client\Connection;
use ArkEcosystem\Client\ConnectionManager;

/**
 * This is the connection manager test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class ConnectionTest extends TestCase
{
    /** @test */
    public function it_should_return_an_api()
    {
        $connection = $this->getConnection();

        $this->assertInstanceOf(AbstractAPI::class, $connection->api('blocks'));
    }

    /**
     * Get a new connection instance.
     *
     * @return Connection
     */
    private function getConnection(): Connection
    {
        $connections = new ConnectionManager();

        $config = new Config([
            'host'        => $this->host,
            'version'     => 1,
        ]);

        return $connections->connect($config);
    }
}
