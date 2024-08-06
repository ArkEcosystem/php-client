<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Rounds
 */
class RoundsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds', function ($client) {
            return $client->rounds()->all();
        });
    }

    /** @test */
    public function view_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds/12345', function ($client) {
            return $client->rounds()->show(12345);
        });
    }

    /** @test */
    public function delegates_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds/12345/delegates', function ($client) {
            return $client->rounds()->delegates(12345);
        });
    }
}
