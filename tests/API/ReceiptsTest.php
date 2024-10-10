<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Receipts
 */
class ReceiptsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'receipts', function ($client) {
            return $client->receipts()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse(
            method: 'GET',
            path: 'receipts?txHash=dummyTxHash',
            callback: function ($client) {
                return $client->receipts()->show('dummyTxHash');
            },
            response: ['data' => [['id' => 'dummyTxHash']]],
            expectedBody: ['id' => 'dummyTxHash']
        );
    }
}
