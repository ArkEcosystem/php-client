<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Blocks
 */
class BlocksTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'blocks', function ($client) {
            return $client->blocks()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'blocks/dummy', function ($client) {
            return $client->blocks()->show('dummy');
        });
    }

    /** @test */
    public function first_calls_correct_url()
    {
        $this->assertResponse('GET', 'blocks/first', function ($client) {
            return $client->blocks()->first();
        });
    }

    /** @test */
    public function last_calls_correct_url()
    {
        $this->assertResponse('GET', 'blocks/last', function ($client) {
            return $client->blocks()->last();
        });
    }

    /** @test */
    public function transactions_calls_correct_url()
    {
        $this->assertResponse('GET', 'blocks/dummy/transactions', function ($client) {
            return $client->blocks()->transactions('dummy');
        });
    }
}
