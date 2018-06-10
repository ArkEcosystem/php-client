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
 * This is the accounts resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class AccountsTest extends TestCase
{
    /** @test */
    public function all_should_be_successful()
    {
        $response = $this->getResource(1, 'accounts')->all();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function show_should_be_successful()
    {
        $response = $this->getResource(1, 'accounts')->show();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function count_should_be_successful()
    {
        $response = $this->getResource(1, 'accounts')->count();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function delegates_should_be_successful()
    {
        $response = $this->getResource(1, 'accounts')->delegates();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function fee_should_be_successful()
    {
        $response = $this->getResource(1, 'accounts')->fee();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function balance_should_be_successful()
    {
        $response = $this->getResource(1, 'accounts')->balance();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function public_key_should_be_successful()
    {
        $response = $this->getResource(1, 'accounts')->publicKey();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function top_should_be_successful()
    {
        $response = $this->getResource(1, 'accounts')->top();

        $this->assertTrue($response->isSuccess());
    }
}
