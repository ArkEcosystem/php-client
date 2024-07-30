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
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds', function ($client) {
            return $client->rounds()->all();
        });
    }

    /** @test */
    public function view_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds/dummy', function ($client) {
            return $client->rounds()->show(12345);
        });
    }

    /** @test */
    public function delegates_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds/12345/delegates', function ($client) {
            return $client->rounds()->delegates(12345);
        });
    }
}
