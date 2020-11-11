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
 * This is the locks resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Client\API\Locks
 */
class LocksTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'locks', function ($connection) {
            return $connection->locks()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'locks/dummy', function ($connection) {
            return $connection->locks()->show('dummy');
        });
    }

    /** @test */
    public function unlocked_calls_correct_url()
    {
        $this->assertResponse('POST', 'locks/unlocked', function ($connection) {
            return $connection->locks()->unlocked(['address' => 'dummy']);
        });
    }
}
