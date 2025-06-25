<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'blocks', function (ArkClient $client) {
        return $client->blocks()->all();
    });
});

it('calls correct url for get', function () {
    $this->assertResponse('GET', 'blocks/dummy', function (ArkClient $client) {
        return $client->blocks()->get('dummy');
    });
});

it('calls correct url for first', function () {
    $this->assertResponse('GET', 'blocks/first', function (ArkClient $client) {
        return $client->blocks()->first();
    });
});

it('calls correct url for last', function () {
    $this->assertResponse('GET', 'blocks/last', function (ArkClient $client) {
        return $client->blocks()->last();
    });
});

it('calls correct url for transactions', function () {
    $this->assertResponse('GET', 'blocks/dummy/transactions', function (ArkClient $client) {
        return $client->blocks()->transactions('dummy');
    });
});
