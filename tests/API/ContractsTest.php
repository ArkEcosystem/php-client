<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;

it('calls the correct url for all contracts', function () {
    $this->assertResponse('GET', 'contracts', function (ArkClient $client) {
        return $client->contracts()->all();
    });
});

it('calls the correct url for abi', function () {
    $this->assertResponse('GET', 'contracts/consensus/some-wallet/abi', function (ArkClient $client) {
        return $client->contracts()->abi('consensus', 'some-wallet');
    });
});
