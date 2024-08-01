<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\ApiNodes
 */
class ApiNodesTest extends TestCase
{
    /** @test */
    public function api_nodes_calls_correct_url()
    {
        $this->assertResponse('GET', 'api-nodes', function ($connection) {
            return $connection->apiNodes()->all();
        });
    }
}
