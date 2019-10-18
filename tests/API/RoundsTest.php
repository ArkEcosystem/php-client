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
 * This is the rounds resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Client\API\Rounds
 */
class RoundsTest extends TestCase
{
    /** @test */
    public function delegates_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds/12345/delegates', function ($connection) {
            return $connection->rounds()->delegates(12345);
        });
    }
}
