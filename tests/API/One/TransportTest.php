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
 * This is the transport resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class TransportTest extends TestCase
{
    /** @test */
    public function blocks_common_should_be_successful()
    {
        $response = $this->getResource(1, 'transport')->blocksCommon();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function create_transactions_should_be_successful()
    {
        $response = $this->getResource(1, 'transport')->createTransactions();

        $this->assertTrue($response->isSuccess());
    }
}
