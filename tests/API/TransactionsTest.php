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
        $this->assertResponse('GET', 'transactions', function ($connection) {
            return $connection->transactions()->all();
        });
    }

    /** @test */
    public function create_calls_correct_url()
    {
        $this->assertResponse('POST', 'transactions', function ($connection) {
            return $connection->transactions()->create(['transactions' => []]);
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/dummy', function ($connection) {
            return $connection->transactions()->show('dummy');
        });
    }

    /** @test */
    public function all_unconfirmed_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/unconfirmed', function ($connection) {
            return $connection->transactions()->allUnconfirmed();
        });
    }

    /** @test */
    public function show_unconfirmed_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/unconfirmed/dummy', function ($connection) {
            return $connection->transactions()->showUnconfirmed('dummy');
        });
    }

    /** @test */
    public function types_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/types', function ($connection) {
            return $connection->transactions()->types();
        });
    }

    /** @test */
    public function fees_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/fees', function ($connection) {
            return $connection->transactions()->fees();
        });
    }

    /** @test */
    public function schemas_calls_correct_url()
    {
        $this->assertResponse('GET', 'transactions/schemas', function ($connection) {
            return $connection->transactions()->schemas();
        });
    }
}
