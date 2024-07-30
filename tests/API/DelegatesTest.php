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
 * This is the delegates resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Client\API\Delegates
 */
class DelegatesTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'delegates', function ($client) {
            return $client->delegates()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'delegates/dummy', function ($client) {
            return $client->delegates()->show('dummy');
        });
    }

    /** @test */
    public function blocks_calls_correct_url()
    {
        $this->assertResponse('GET', 'delegates/dummy/blocks', function ($client) {
            return $client->delegates()->blocks('dummy');
        });
    }

    /** @test */
    public function voters_calls_correct_url()
    {
        $this->assertResponse('GET', 'delegates/dummy/voters', function ($client) {
            return $client->delegates()->voters('dummy');
        });
    }
}
