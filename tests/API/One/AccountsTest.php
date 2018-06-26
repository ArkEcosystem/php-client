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

namespace ArkEcosystem\Tests\Client\API\One;

use ArkEcosystem\Tests\Client\TestCase;
use GuzzleHttp\Client;

/**
 * This is the accounts resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class AccountsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'accounts/getAllAccounts', function ($mock) {
            return $mock->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'accounts', function ($mock) {
            return $mock->show('dummy');
        });
    }

    /** @test */
    public function count_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'accounts/count', function ($mock) {
            return $mock->count();
        });
    }

    /** @test */
    public function delegates_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'accounts/delegates', function ($mock) {
            return $mock->delegates('dummy');
        });
    }

    /** @test */
    public function fee_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'accounts/delegates/fee', function ($mock) {
            return $mock->fee();
        });
    }

    /** @test */
    public function balance_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'accounts/getBalance', function ($mock) {
            return $mock->balance('dummy');
        });
    }

    /** @test */
    public function public_key_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'accounts/getPublicKey', function ($mock) {
            return $mock->publicKey('dummy');
        });
    }

    /** @test */
    public function top_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'accounts/top', function ($mock) {
            return $mock->top();
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\One\Accounts::class;
    }
}
