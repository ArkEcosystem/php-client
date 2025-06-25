<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'wallets', function (ArkClient $client) {
        return $client->wallets()->all();
    });
});

it('calls correct url for top', function () {
    $this->assertResponse('GET', 'wallets/top', function (ArkClient $client) {
        return $client->wallets()->top();
    });
});

it('calls correct url for get', function () {
    $this->assertResponse('GET', 'wallets/dummy', function (ArkClient $client) {
        return $client->wallets()->get('dummy');
    });
});

it('calls correct url for transactions', function () {
    $this->assertResponse('GET', 'wallets/dummy/transactions', function (ArkClient $client) {
        return $client->wallets()->transactions('dummy');
    });
});

it('calls correct url for sent transactions', function () {
    $this->assertResponse('GET', 'wallets/dummy/transactions/sent', function (ArkClient $client) {
        return $client->wallets()->sentTransactions('dummy');
    });
});

it('calls correct url for received transactions', function () {
    $this->assertResponse('GET', 'wallets/dummy/transactions/received', function (ArkClient $client) {
        return $client->wallets()->receivedTransactions('dummy');
    });
});

it('calls correct url for votes', function () {
    $this->assertResponse('GET', 'wallets/dummy/votes', function (ArkClient $client) {
        return $client->wallets()->votes('dummy');
    });
});
