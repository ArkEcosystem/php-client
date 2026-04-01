<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\Client;

it('calls the correct URL for eth_call', function () {
    $this->assertResponse(
        method: 'POST',
        path: 'api/',
        callback: function (Client $client) {
            return $client->evm()->call([
                'method'     => 'eth_call',
                    'params' => [[
                        'from' => '0x1234567890abcdef',
                        'to'   => '0xfedcba0987654321',
                        'data' => '0xabcdef',
                    ], 'latest'],
                    'id' => null,
            ]);
        },
        expectedApi: 'evm'
    );
});
