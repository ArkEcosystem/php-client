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

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Blockchain
 */
class BlockchainTest extends TestCase
{
    /** @test */
    public function blockchain´_calls_correct_url()
    {
        $this->assertResponse('GET', 'blockchain', function ($connection) {
            return $connection->blockchain()->blockchain();
        });
    }
}
