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
 * This is the wallets resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class WalletsTest extends TestCase
{
    /** @test */
    public function all_should_be_successful()
    {
        $response = $this->getResource(2, 'wallets')->all();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function top_should_be_successful()
    {
        $response = $this->getResource(2, 'wallets')->top();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function show_should_be_successful()
    {
        $response = $this->getResource(2, 'wallets')->show();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function transactions_should_be_successful()
    {
        $response = $this->getResource(2, 'wallets')->transactions();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function transactions_sent_should_be_successful()
    {
        $response = $this->getResource(2, 'wallets')->transactionsSent();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function transactions_received_should_be_successful()
    {
        $response = $this->getResource(2, 'wallets')->transactionsReceived();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function votes_should_be_successful()
    {
        $response = $this->getResource(2, 'wallets')->votes();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function search_should_be_successful()
    {
        $response = $this->getResource(2, 'wallets')->search();

        $this->assertTrue($response->isSuccess());
    }
}
