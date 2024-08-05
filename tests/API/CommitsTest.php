<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
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
