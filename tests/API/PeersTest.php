<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Peers
 */
class PeersTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'peers', function ($connection) {
            return $connection->peers()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'peers/dummy', function ($connection) {
            return $connection->peers()->show('dummy');
        });
    }
}
