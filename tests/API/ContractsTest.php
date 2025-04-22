<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * @covers \ArkEcosystem\Client\API\Contracts
 */
class ContractsTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'contracts', function ($client) {
            return $client->contracts()->all();
        });
    }

    /** @test */
    public function abi_calls_correct_url()
    {
        $this->assertResponse('GET', 'contracts/consensus/some-wallet/abi', function ($client) {
            return $client->contracts()->abi('consensus', 'some-wallet');
        });
    }
}
