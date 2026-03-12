<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\Client;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'rounds', function (Client $client) {
        return $client->rounds()->all();
    });
});

it('calls correct url for view', function () {
    $this->assertResponse('GET', 'rounds/12345', function (Client $client) {
        return $client->rounds()->get(12345);
    });
});

it('calls correct url for validators', function () {
    $this->assertResponse('GET', 'rounds/12345/validators', function (Client $client) {
        return $client->rounds()->validators(12345);
    });
});
