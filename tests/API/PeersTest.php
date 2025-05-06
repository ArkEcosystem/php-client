<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Peers
 */
class PeersTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'peers', function (ArkClient $client) {
            return $client->peers()->all();
        });
    }

    /** @test */
    public function get_calls_correct_url()
    {
        $this->assertResponse('GET', 'peers/dummy', function (ArkClient $client) {
            return $client->peers()->get('dummy');
        });
    }
}
