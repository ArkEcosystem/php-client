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
 * This is the commits resource test class.
 *
 * @author Alfonso Bribiesca <alfonso@ardenthq.com>
 * @covers \ArkEcosystem\Client\API\Commits
 */
class CommitsTest extends TestCase
{
    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'commits/1', function ($client) {
            return $client->commits()->show(1);
        });
    }
}
