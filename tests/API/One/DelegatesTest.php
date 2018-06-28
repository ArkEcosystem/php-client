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
 * This is the delegates resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class DelegatesTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'delegates', function ($mock) {
            return $mock->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'delegates/get', function ($mock) {
            return $mock->show(['username' => 'dummy']);
        });
    }

    /** @test */
    public function count_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'delegates/count', function ($mock) {
            return $mock->count();
        });
    }

    /** @test */
    public function fee_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'delegates/fee', function ($mock) {
            return $mock->fee();
        });
    }

    /** @test */
    public function forged_by_account_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'delegates/forging/getForgedByAccount', function ($mock) {
            return $mock->forgedByAccount('dummy');
        });
    }

    /** @test */
    public function search_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'delegates/search', function ($mock) {
            return $mock->search('dummy');
        });
    }

    /** @test */
    public function voters_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'delegates/voters', function ($mock) {
            return $mock->voters('dummy');
        });
    }

    /** @test */
    public function next_forgers_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'delegates/getNextForgers', function ($mock) {
            return $mock->nextForgers();
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\One\Delegates::class;
    }
}
