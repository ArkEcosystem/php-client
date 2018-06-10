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
    public function all_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->all();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function show_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->show();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function epoch_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->epoch();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function fee_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->fee();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function fees_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->fees();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function height_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->height();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function milestone_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->milestone();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function nethash_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->nethash();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function reward_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->reward();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function status_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->status();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function supply_should_be_successful()
    {
        $response = $this->getResource(1, 'blocks')->supply();

        $this->assertTrue($response->isSuccess());
    }
}
