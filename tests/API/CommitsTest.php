<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Commits
 */
class CommitsTest extends TestCase
{
    /** @test */
    public function get_calls_correct_url()
    {
        $this->assertResponse('GET', 'commits/1', function (ArkClient $client) {
            return $client->commits()->get(1);
        });
    }
}
