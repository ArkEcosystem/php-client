<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Blockchain
 */
class BlockchainTest extends TestCase
{
    /** @test */
    public function blockchain´_calls_correct_url()
    {
        $this->assertResponse('GET', 'blockchain', function (ArkClient $client) {
            return $client->blockchain()->blockchain();
        });
    }
}
