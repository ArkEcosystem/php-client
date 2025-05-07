<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;
use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Rounds
 */
class RoundsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds', function (ArkClient $client) {
            return $client->rounds()->all();
        });
    }

    /** @test */
    public function view_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds/12345', function (ArkClient $client) {
            return $client->rounds()->get(12345);
        });
    }

    /** @test */
    public function validators_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds/12345/validators', function (ArkClient $client) {
            return $client->rounds()->validators(12345);
        });
    }
}
