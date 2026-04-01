<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\Client;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'peers', function (Client $client) {
        return $client->peers()->all();
    });
});

it('calls correct url for get', function () {
    $this->assertResponse('GET', 'peers/dummy', function (Client $client) {
        return $client->peers()->get('dummy');
    });
});
