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
 * This is the bridgechains resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Client\API\Bridgechains
 */
class BridgechainsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'bridgechains', function ($connection) {
            return $connection->bridgechains()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'bridgechains/dummy', function ($connection) {
            return $connection->bridgechains()->show('dummy');
        });
    }

    /** @test */
    public function search_calls_correct_url()
    {
        $this->assertResponse('POST', 'bridgechains/search', function ($connection) {
            return $connection->bridgechains()->search(['address' => 'dummy']);
        });
    }
}
