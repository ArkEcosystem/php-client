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
        $this->assertResponse(1, 'GET', 'api/transactions', function ($mock) {
            return $mock->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'api/transactions/get', function ($mock) {
            return $mock->show('dummy');
        });
    }

    /** @test */
    public function all_unconfirmed_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'api/transactions/unconfirmed', function ($mock) {
            return $mock->allUnconfirmed();
        });
    }

    /** @test */
    public function show_unconfirmed_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'api/transactions/unconfirmed/get', function ($mock) {
            return $mock->showUnconfirmed('dummy');
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\One\Transactions::class;
    }
}
