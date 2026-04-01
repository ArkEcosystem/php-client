<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\Client;

it('calls the correct url for api nodes', function () {
    $this->assertResponse('GET', 'api-nodes', function (Client $client) {
        return $client->apiNodes()->all();
    });
});
