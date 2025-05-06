<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Wallets
 */
class WalletsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets', function (ArkClient $client) {
            return $client->wallets()->all();
        });
    }

    /** @test */
    public function top_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/top', function (ArkClient $client) {
            return $client->wallets()->top();
        });
    }

    /** @test */
    public function get_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/dummy', function (ArkClient $client) {
            return $client->wallets()->get('dummy');
        });
    }

    /** @test */
    public function transactions_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/dummy/transactions', function (ArkClient $client) {
            return $client->wallets()->transactions('dummy');
        });
    }

    /** @test */
    public function sent_transactions_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/dummy/transactions/sent', function (ArkClient $client) {
            return $client->wallets()->sentTransactions('dummy');
        });
    }

    /** @test */
    public function received_transactions_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/dummy/transactions/received', function (ArkClient $client) {
            return $client->wallets()->receivedTransactions('dummy');
        });
    }

    /** @test */
    public function votes_calls_correct_url()
    {
        $this->assertResponse('GET', 'wallets/dummy/votes', function (ArkClient $client) {
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
