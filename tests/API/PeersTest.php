<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'peers', function (ArkClient $client) {
        return $client->peers()->all();
    });
});

it('calls correct url for get', function () {
    $this->assertResponse('GET', 'peers/dummy', function (ArkClient $client) {
        return $client->peers()->get('dummy');
    });
});
