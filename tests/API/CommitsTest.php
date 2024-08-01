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
        $this->assertResponse('GET', 'commits', function ($connection) {
            return $connection->commits()->show(1);
        });
    }
}
