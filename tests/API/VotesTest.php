<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\Client;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'votes', function (Client $client) {
        return $client->votes()->all();
    });
});

it('calls correct url for get', function () {
    $this->assertResponse('GET', 'votes/dummy', function (Client $client) {
        return $client->votes()->get('dummy');
    });
});
