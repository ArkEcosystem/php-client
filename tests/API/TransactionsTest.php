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
 * This is the transactions resource test class.
 *
 * @author Brian Faust <brian@ark.io>
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
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/dummy', function ($client) {
            return $client->transactions()->show('dummy');
        });
    }

    /** @test */
    public function all_unconfirmed_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/unconfirmed', function ($client) {
            return $client->transactions()->allUnconfirmed();
        });
    }

    /** @test */
    public function show_unconfirmed_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/unconfirmed/dummy', function ($client) {
            return $client->transactions()->showUnconfirmed('dummy');
        });
    }

    /** @test */
    public function types_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/types', function ($client) {
            return $client->transactions()->types();
        });
    }

    /** @test */
    public function fees_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/fees', function ($client) {
            return $client->transactions()->fees();
        });
    }

    /** @test */
    public function schemas_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/schemas', function ($client) {
            return $client->transactions()->schemas();
        });
    }
}
