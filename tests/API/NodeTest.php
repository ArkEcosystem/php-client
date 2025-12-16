<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;

it('calls the correct url for status', function () {
    $this->assertResponse('GET', 'node/status', function (ArkClient $client) {
        return $client->node()->status();
    });
});

it('calls the correct url for syncing', function () {
    $this->assertResponse('GET', 'node/syncing', function (ArkClient $client) {
        return $client->node()->syncing();
    });
});

it('calls the correct url for configuration', function () {
    $this->assertResponse('GET', 'node/configuration', function (ArkClient $client) {
        return $client->node()->configuration();
    });
});

it('calls the correct url for crypto', function () {
    $this->assertResponse('GET', 'node/configuration/crypto', function (ArkClient $client) {
        return $client->node()->crypto();
    });
});

it('calls the correct url for fees', function () {
    $this->assertResponse('GET', 'node/fees', function (ArkClient $client) {
        return $client->node()->fees();
    });
});
