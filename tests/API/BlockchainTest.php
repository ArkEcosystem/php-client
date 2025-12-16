<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;

it('calls the correct blockchain url', function () {
    $this->assertResponse('GET', 'blockchain', function (ArkClient $client) {
        return $client->blockchain()->blockchain();
    });
});
