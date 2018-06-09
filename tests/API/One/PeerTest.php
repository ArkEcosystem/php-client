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

namespace ArkEcosystem\Tests\ArkClient\API\One;

use ArkEcosystem\Tests\ArkClient\TestCase;

/**
 * @coversNothing
 */
class PeerTest extends TestCase
{
    /** @test */
    public function can_get_peers()
    {
        // Act...
        $response = $this->getClient()->api('Peers')->all();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_version()
    {
        // Act...
        $response = $this->getClient()->api('Peers')->version();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_peer()
    {
        // Arrange...
        $ip = '167.114.29.33';
        $port = 4001;

        // Act...
        $response = $this->getClient()->api('Peers')->show($ip, $port);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
