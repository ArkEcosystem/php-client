<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Validators
 */
class ValidatorsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'validators', function ($client) {
            return $client->validators()->all();
        });
    }

    /** @test */
    public function get_calls_correct_url()
    {
        $this->assertResponse('GET', 'validators/dummy', function ($client) {
            return $client->validators()->get('dummy');
        });
    }

    /** @test */
    public function blocks_calls_correct_url()
    {
        $this->assertResponse('GET', 'validators/dummy/blocks', function ($client) {
            return $client->validators()->blocks('dummy');
        });
    }

    /** @test */
    public function voters_calls_correct_url()
    {
        $this->assertResponse('GET', 'validators/dummy/voters', function ($client) {
            return $client->validators()->voters('dummy');
        });
    }
}
