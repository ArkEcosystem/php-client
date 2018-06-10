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
 * This is the transactions resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class TransactionsTest extends TestCase
{
    /** @test */
    public function all_should_be_successful()
    {
        $response = $this->getResource(2, 'transactions')->all();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function create_should_be_successful()
    {
        $response = $this->getResource(2, 'transactions')->create();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function show_should_be_successful()
    {
        $response = $this->getResource(2, 'transactions')->show();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function all_unconfirmed_should_be_successful()
    {
        $response = $this->getResource(2, 'transactions')->allUnconfirmed();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function get_unconfirmed_should_be_successful()
    {
        $response = $this->getResource(2, 'transactions')->getUnconfirmed();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function search_should_be_successful()
    {
        $response = $this->getResource(2, 'transactions')->search();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function types_should_be_successful()
    {
        $response = $this->getResource(2, 'transactions')->types();

        $this->assertTrue($response->isSuccess());
    }
}
