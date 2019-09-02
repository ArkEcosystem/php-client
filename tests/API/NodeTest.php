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

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * This is the node resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Client\API\Node
 */
class NodeTest extends TestCase
{
    /** @test */
    public function status_calls_correct_url()
    {
        $this->assertResponse('GET', 'node/status', function ($connection) {
            return $connection->node()->status();
        });
    }

    /** @test */
    public function syncing_calls_correct_url()
    {
        $this->assertResponse('GET', 'node/syncing', function ($connection) {
            return $connection->node()->syncing();
        });
    }

    /** @test */
    public function configuration_calls_correct_url()
    {
        $this->assertResponse('GET', 'node/configuration', function ($connection) {
            return $connection->node()->configuration();
        });
    }

    /** @test */
    public function crypto_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'node/configuration/crypto', function ($connection) {
            return $connection->node()->crypto();
        });
    }

    /** @test */
    public function fees_calls_correct_url()
    {
        $this->assertResponse('GET', 'node/fees', function ($connection) {
            return $connection->node()->fees();
        });
    }
}
