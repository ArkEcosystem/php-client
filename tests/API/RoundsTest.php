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
        $this->assertResponse('GET', 'rounds', function ($connection) {
            return $connection->rounds()->all();
        });
    }

    /** @test */
    public function view_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds/dummy', function ($connection) {
            return $connection->rounds()->show(12345);
        });
    }

    /** @test */
    public function delegates_calls_correct_url()
    {
        $this->assertResponse('GET', 'rounds/12345/delegates', function ($connection) {
            return $connection->rounds()->delegates(12345);
        });
    }
}
