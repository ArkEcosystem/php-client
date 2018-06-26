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
 * This is the blocks resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class BlocksTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'blocks', function ($mock) {
            return $mock->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'blocks/dummy', function ($mock) {
            return $mock->show('dummy');
        });
    }

    /** @test */
    public function transactions_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'blocks/dummy/transactions', function ($mock) {
            return $mock->transactions('dummy');
        });
    }

    /** @test */
    public function search_calls_correct_url()
    {
        $this->assertResponse(2, 'POST', 'blocks/search', function ($mock) {
            return $mock->search(['address' => 'dummy']);
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\Two\Blocks::class;
    }
}
