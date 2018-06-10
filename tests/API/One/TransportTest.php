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
 * @coversNothing
 */
class TransportTest extends TestCase
{
    /** @test */
    public function can_get_blocks_common()
    {
        // Arrange...
        $ids = ['2745982198389373800'];

        // Act...
        $response = $this->getClient()->api('Transport')->blocksCommon($ids);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_transactions()
    {
        // Arrange...
        $transactions = [];

        // Act...
        $response = $this->getClient()->api('Transport')->createTransactions($transactions);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
