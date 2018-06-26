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
        $this->assertResponse(1, 'GET', 'blocks', function ($mock) {
            return $mock->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'blocks/get', function ($mock) {
            return $mock->show('dummy');
        });
    }

    /** @test */
    public function epoch_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'blocks/getEpoch', function ($mock) {
            return $mock->epoch();
        });
    }

    /** @test */
    public function fee_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'blocks/getFee', function ($mock) {
            return $mock->fee();
        });
    }

    /** @test */
    public function fees_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'blocks/getFees', function ($mock) {
            return $mock->fees();
        });
    }

    /** @test */
    public function height_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'blocks/getHeight', function ($mock) {
            return $mock->height();
        });
    }

    /** @test */
    public function milestone_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'blocks/getMilestone', function ($mock) {
            return $mock->milestone();
        });
    }

    /** @test */
    public function nethash_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'blocks/getNethash', function ($mock) {
            return $mock->nethash();
        });
    }

    /** @test */
    public function reward_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'blocks/getReward', function ($mock) {
            return $mock->reward();
        });
    }

    /** @test */
    public function status_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'blocks/getStatus', function ($mock) {
            return $mock->status();
        });
    }

    /** @test */
    public function supply_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'blocks/getSupply', function ($mock) {
            return $mock->supply();
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\One\Blocks::class;
    }
}
