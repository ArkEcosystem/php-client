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

namespace ArkEcosystem\Tests\Client\API\Two;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * This is the node resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class NodeTest extends TestCase
{
    /** @test */
    public function status_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/node/status', function ($mock) {
            return $mock->status();
        });
    }

    /** @test */
    public function syncing_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/node/syncing', function ($mock) {
            return $mock->syncing();
        });
    }

    /** @test */
    public function configuration_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/node/configuration', function ($mock) {
            return $mock->configuration();
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\Two\Node::class;
    }
}
