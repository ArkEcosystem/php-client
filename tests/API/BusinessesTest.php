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
 * This is the businesses resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Client\API\Businesses
 */
class BusinessesTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'businesses', function ($connection) {
            return $connection->businesses()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'businesses/dummy', function ($connection) {
            return $connection->businesses()->show('dummy');
        });
    }

    /** @test */
    public function bridgechains_calls_correct_url()
    {
        $this->assertResponse('GET', 'businesses/dummy/bridgechains', function ($connection) {
            return $connection->businesses()->bridgechains('dummy');
        });
    }

    /** @test */
    public function search_calls_correct_url()
    {
        $this->assertResponse('POST', 'businesses/search', function ($connection) {
            return $connection->businesses()->search(['address' => 'dummy']);
        });
    }
}
