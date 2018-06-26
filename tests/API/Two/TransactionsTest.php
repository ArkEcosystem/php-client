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

namespace ArkEcosystem\Tests\Client\API\Two;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * This is the transactions resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class TransactionsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/transactions', function ($mock) {
            return $mock->all();
        });
    }

    /** @test */
    public function create_calls_correct_url()
    {
        $this->assertResponse(2, 'POST', 'api/transactions', function ($mock) {
            return $mock->create(['transactions' => []]);
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/transactions/dummy', function ($mock) {
            return $mock->show('dummy');
        });
    }

    /** @test */
    public function all_unconfirmed_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/transactions/unconfirmed', function ($mock) {
            return $mock->allUnconfirmed();
        });
    }

    /** @test */
    public function show_unconfirmed_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/transactions/unconfirmed/dummy', function ($mock) {
            return $mock->showUnconfirmed('dummy');
        });
    }

    /** @test */
    public function search_calls_correct_url()
    {
        $this->assertResponse(2, 'POST', 'api/transactions/search', function ($mock) {
            return $mock->search(['amount' => 1]);
        });
    }

    /** @test */
    public function types_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/transactions/types', function ($mock) {
            return $mock->types();
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\Two\Transactions::class;
    }
}
