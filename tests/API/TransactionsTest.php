<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Transactions
 */
class TransactionsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions', function ($client) {
            return $client->transactions()->all();
        });
    }

    /** @test */
    public function create_calls_correct_url()
    {
        $this->assertResponse(
            method: 'POST',
            path: 'transactions',
            callback: function ($client) {
                return $client->transactions()->create(['transactions' => []]);
            },
            expectedApi: 'transactions'
        );
    }

    /** @test */
    public function get_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/dummy', function ($client) {
            return $client->transactions()->get('dummy');
        });
    }

    /** @test */
    public function all_unconfirmed_calls_correct_url()
    {
        $this->assertResponse(
            method: 'GET',
            path: 'transactions/unconfirmed',
            callback: function ($client) {
                return $client->transactions()->allUnconfirmed();
            },
            expectedApi: 'transactions'
        );
    }

    /** @test */
    public function get_unconfirmed_calls_correct_url()
    {
        $this->assertResponse(
            method: 'GET',
            path: 'transactions/unconfirmed/dummy',
            callback: function ($client) {
                return $client->transactions()->getUnconfirmed('dummy');
            },
            expectedApi: 'transactions'
        );
    }

    /** @test */
    public function configuration_calls_correct_url()
    {
        $this->assertResponse(
            method: 'GET',
            path: 'configuration',
            callback: function ($client) {
                return $client->transactions()->configuration();
            },
            expectedApi: 'transactions'
        );
    }
}
