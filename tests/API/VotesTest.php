<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Votes
 */
class VotesTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'votes', function ($connection) {
            return $connection->votes()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'votes/dummy', function ($connection) {
            return $connection->votes()->show('dummy');
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\Votes::class;
    }
}
