<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\Client;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'transactions', function (Client $client) {
        return $client->transactions()->all();
    });
});

it('calls correct url for create', function () {
    $this->assertResponse(
        method: 'POST',
        path: 'transactions',
        callback: function (Client $client) {
            return $client->transactions()->create(['transactions' => []]);
        },
        expectedApi: 'transactions'
    );
});

it('calls correct url for get', function () {
    $this->assertResponse('GET', 'transactions/dummy', function (Client $client) {
        return $client->transactions()->get('dummy');
    });
});

it('calls correct url for all unconfirmed', function () {
    $this->assertResponse(
        method: 'GET',
        path: 'transactions/unconfirmed',
        callback: function (Client $client) {
            return $client->transactions()->allUnconfirmed();
        },
        expectedApi: 'transactions'
    );
});

it('calls correct url for get unconfirmed', function () {
    $this->assertResponse(
        method: 'GET',
        path: 'transactions/unconfirmed/dummy',
        callback: function (Client $client) {
            return $client->transactions()->getUnconfirmed('dummy');
        },
        expectedApi: 'transactions'
    );
});

it('calls correct url for configuration', function () {
    $this->assertResponse(
        method: 'GET',
        path: 'configuration',
        callback: function (Client $client) {
            return $client->transactions()->configuration();
        },
        expectedApi: 'transactions'
    );
});
