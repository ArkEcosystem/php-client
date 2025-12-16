<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'rounds', function (ArkClient $client) {
        return $client->rounds()->all();
    });
});

it('calls correct url for view', function () {
    $this->assertResponse('GET', 'rounds/12345', function (ArkClient $client) {
        return $client->rounds()->get(12345);
    });
});

it('calls correct url for validators', function () {
    $this->assertResponse('GET', 'rounds/12345/validators', function (ArkClient $client) {
        return $client->rounds()->validators(12345);
    });
});
