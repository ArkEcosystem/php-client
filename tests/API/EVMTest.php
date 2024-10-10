<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\EVM
 */
class EVMTest extends TestCase
{
    /** @test */
    public function eth_call_calls_correct_url()
    {
        $this->assertResponse(
            method: 'POST',
            path: 'api/',
            callback: function ($client) {
                return $client->evm()->ethCall([
                    'from' => '0x1234567890abcdef',
                    'to'   => '0xfedcba0987654321',
                    'data' => '0xabcdef',
                ]);
            },
            expectedApi: 'evm'
        );
    }
}
