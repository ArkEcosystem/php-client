<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Node
 */
class NodeTest extends TestCase
{
    /** @test */
    public function status_calls_correct_url()
    {
        $this->assertResponse('GET', 'node/status', function (ArkClient $client) {
            return $client->node()->status();
        });
    }

    /** @test */
    public function syncing_calls_correct_url()
    {
        $this->assertResponse('GET', 'node/syncing', function (ArkClient $client) {
            return $client->node()->syncing();
        });
    }

    /** @test */
    public function configuration_calls_correct_url()
    {
        $this->assertResponse('GET', 'node/configuration', function (ArkClient $client) {
            return $client->node()->configuration();
        });
    }

    /** @test */
    public function crypto_calls_correct_url()
    {
        $this->assertResponse('GET', 'node/configuration/crypto', function (ArkClient $client) {
            return $client->node()->crypto();
        });
    }

    /** @test */
    public function fees_calls_correct_url()
    {
        $this->assertResponse('GET', 'node/fees', function (ArkClient $client) {
            return $client->node()->fees();
        });
    }
}
