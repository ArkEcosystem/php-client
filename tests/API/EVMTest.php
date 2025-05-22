<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\EVM
 */
class EVMTest extends TestCase
{
    /** @test */
    public function evm_call_calls_correct_url()
    {
        $this->assertResponse(
            method: 'POST',
            path: 'api/',
            callback: function (ArkClient $client) {
                return $client->evm()->evmCall([
                    'method' => 'eth_call',
                    'params' => [[
                        'from' => '0x1234567890abcdef',
                        'to'   => '0xfedcba0987654321',
                        'data' => '0xabcdef',
                    ], 'latest'],
                    'id' => null,
                ]);
            },
            expectedApi: 'evm'
        );
    }
}
