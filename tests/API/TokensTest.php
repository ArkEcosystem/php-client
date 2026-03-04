<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'tokens', function (ArkClient $client) {
        return $client->tokens()->all();
    });
});

it('calls correct url for all with whitelist', function () {
    $this->assertResponse('POST', 'tokens', function (ArkClient $client) {
        return $client->tokens()->allWithWhitelist([
            'whitelist' => ['0x1234567890abcdef1234567890abcdef12345678'],
        ]);
    });
});

it('calls correct url for get', function () {
    $this->assertResponse('GET', 'tokens/dummy', function (ArkClient $client) {
        return $client->tokens()->get('dummy');
    });
});

it('calls correct url for holders', function () {
    $this->assertResponse('GET', 'tokens/dummy/holders', function (ArkClient $client) {
        return $client->tokens()->holders('dummy');
    });
});

it('calls correct url for transfers by token', function () {
    $this->assertResponse('GET', 'tokens/dummy/transfers', function (ArkClient $client) {
        return $client->tokens()->transfersByToken('dummy');
    });
});

it('calls correct url for all transfers', function () {
    $this->assertResponse('GET', 'tokens/transfers', function (ArkClient $client) {
        return $client->tokens()->transfers();
    });
});

it('calls correct url for whitelist', function () {
    $this->assertResponse('GET', 'tokens/whitelist', function (ArkClient $client) {
        return $client->tokens()->whitelist();
    });
});
