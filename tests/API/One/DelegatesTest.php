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
    public function all_should_be_successful()
    {
        $response = $this->getResource(1, 'delegates')->all();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function show_should_be_successful()
    {
        $response = $this->getResource(1, 'delegates')->show();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function count_should_be_successful()
    {
        $response = $this->getResource(1, 'delegates')->count();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function fee_should_be_successful()
    {
        $response = $this->getResource(1, 'delegates')->fee();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function forged_by_account_should_be_successful()
    {
        $response = $this->getResource(1, 'delegates')->forgedByAccount();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function search_should_be_successful()
    {
        $response = $this->getResource(1, 'delegates')->search();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function voters_should_be_successful()
    {
        $response = $this->getResource(1, 'delegates')->voters();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function next_forgers_should_be_successful()
    {
        $response = $this->getResource(1, 'delegates')->nextForgers();

        $this->assertTrue($response->isSuccess());
    }
}
