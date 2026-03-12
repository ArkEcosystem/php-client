<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\Client;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'wallets', function (Client $client) {
        return $client->wallets()->all();
    });
});

it('calls correct url for top', function () {
    $this->assertResponse('GET', 'wallets/top', function (Client $client) {
        return $client->wallets()->top();
    });
});

it('calls correct url for get', function () {
    $this->assertResponse('GET', 'wallets/dummy', function (Client $client) {
        return $client->wallets()->get('dummy');
    });
});

it('calls correct url for transactions', function () {
    $this->assertResponse('GET', 'wallets/dummy/transactions', function (Client $client) {
        return $client->wallets()->transactions('dummy');
    });
});

it('calls correct url for sent transactions', function () {
    $this->assertResponse('GET', 'wallets/dummy/transactions/sent', function (Client $client) {
        return $client->wallets()->sentTransactions('dummy');
    });
});

it('calls correct url for received transactions', function () {
    $this->assertResponse('GET', 'wallets/dummy/transactions/received', function (Client $client) {
        return $client->wallets()->receivedTransactions('dummy');
    });
});

it('calls correct url for votes', function () {
    $this->assertResponse('GET', 'wallets/dummy/votes', function (Client $client) {
        return $client->wallets()->votes('dummy');
    });
});

it('calls correct url for all wallet tokens', function () {
    $this->assertResponse('GET', 'wallets/tokens', function (Client $client) {
        return $client->wallets()->tokens();
    });
});

it('calls correct url for all wallet tokens with query', function () {
    $this->assertResponse('GET', 'wallets/tokens?limit=10', function (Client $client) {
        return $client->wallets()->tokens([
            'limit' => 10,
        ]);
    });
});

it('calls correct url for a wallet tokens', function () {
    $this->assertResponse('GET', 'wallets/dummy/tokens', function (Client $client) {
        return $client->wallets()->tokensFor('dummy');
    });
});

it('calls correct url for a wallet tokens with query', function () {
    $this->assertResponse('GET', 'wallets/dummy/tokens?limit=10', function (Client $client) {
        return $client->wallets()->tokensFor('dummy', [
            'limit' => 10,
        ]);
    });
});

it('calls correct url for a wallet tokens with whitelist', function () {
    $this->assertResponse(
        'POST',
        'wallets/dummy/tokens',
        function (Client $client) {

            return $client->wallets()->tokensFor('dummy', [
                'whitelist' => ['0x1234567890abcdef1234567890abcdef12345678'],
            ]);
        },
        expectedRequestBody: [
            'whitelist' => ['0x1234567890abcdef1234567890abcdef12345678'],
        ]
    );
});

it('calls correct url for all wallet tokens with whitelist', function () {
    $this->assertResponse(
        'POST',
        'wallets/tokens',
        function (Client $client) {
            return $client->wallets()->tokens([
                'whitelist' => ['0x1234567890abcdef1234567890abcdef12345678'],
            ]);
        },
        expectedRequestBody: [
            'whitelist' => ['0x1234567890abcdef1234567890abcdef12345678'],
        ]
    );
});
