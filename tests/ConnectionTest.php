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

use ArkEcosystem\Client\API\AbstractResource;

/**
 * This is the connection manager test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class ConnectionTest extends TestCase
{
    /** @test */
    public function it_should_set_the_api_version()
    {
        $connection = $this->getConnection();
        $connection->version(123);

        $this->assertSame($connection->config->get('api_version'), 123);
    }

    /** @test */
    public function it_should_configure_the_connection()
    {
        $connection = $this->getConnection();
        $connection->configure();

        $this->assertInternalType('string', $connection->config->get('nethash'));
        $this->assertInternalType('string', $connection->config->get('version'));
    }

    /** @test */
    public function it_should_return_a_resource()
    {
        $connection = $this->getConnection();

        $this->assertInstanceOf(AbstractResource::class, $connection->api('blocks'));
    }
}
