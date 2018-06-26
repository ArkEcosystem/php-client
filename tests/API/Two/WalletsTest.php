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
 * This is the wallets resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class WalletsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/wallets', function ($mock) {
            return $mock->all();
        });
    }

    /** @test */
    public function top_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/wallets/top', function ($mock) {
            return $mock->top();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/wallets/dummy', function ($mock) {
            return $mock->show('dummy');
        });
    }

    /** @test */
    public function transactions_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/wallets/dummy/transactions', function ($mock) {
            return $mock->transactions('dummy');
        });
    }

    /** @test */
    public function sent_transactions_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/wallets/dummy/transactions/sent', function ($mock) {
            return $mock->sentTransactions('dummy');
        });
    }

    /** @test */
    public function received_transactions_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/wallets/dummy/transactions/received', function ($mock) {
            return $mock->receivedTransactions('dummy');
        });
    }

    /** @test */
    public function votes_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/wallets/dummy/votes', function ($mock) {
            return $mock->votes('dummy');
        });
    }

    /** @test */
    public function search_calls_correct_url()
    {
        $this->assertResponse(2, 'POST', 'api/wallets/search', function ($mock) {
            return $mock->search(['address' => 'dummy']);
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\Two\Wallets::class;
    }
}
