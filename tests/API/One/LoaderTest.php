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
 * This is the loader resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class LoaderTest extends TestCase
{
    /** @test */
    public function status_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'api/loader/status', function ($mock) {
            return $mock->status();
        });
    }

    /** @test */
    public function sync_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'api/loader/status/sync', function ($mock) {
            return $mock->sync();
        });
    }

    /** @test */
    public function autoconfigure_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'api/loader/autoconfigure', function ($mock) {
            return $mock->autoconfigure();
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\One\Loader::class;
    }
}
