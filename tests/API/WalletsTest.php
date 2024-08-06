<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Wallets
 */
class WalletsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets', function ($client) {
            return $client->wallets()->all();
        });
    }

    /** @test */
    public function top_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/top', function ($client) {
            return $client->wallets()->top();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/dummy', function ($client) {
            return $client->wallets()->show('dummy');
        });
    }

    /** @test */
    public function transactions_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/dummy/transactions', function ($client) {
            return $client->wallets()->transactions('dummy');
        });
    }

    /** @test */
    public function sent_transactions_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/dummy/transactions/sent', function ($client) {
            return $client->wallets()->sentTransactions('dummy');
        });
    }

    /** @test */
    public function received_transactions_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/dummy/transactions/received', function ($client) {
            return $client->wallets()->receivedTransactions('dummy');
        });
    }

    /** @test */
    public function votes_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/dummy/votes', function ($client) {
            return $client->wallets()->votes('dummy');
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\Wallets::class;
    }
}
