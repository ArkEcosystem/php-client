<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;
use Exception;

it('calls the correct url for all', function () {
    $this->assertResponse('GET', 'receipts', function (ArkClient $client) {
        return $client->receipts()->all();
    });
});

it('calls the correct url for get', function () {
    $this->assertResponse(
        method: 'GET',
        path: 'receipts/dummyTxHash',
        callback: function (ArkClient $client) {
            return $client->receipts()->get('dummyTxHash');
        },
        response: ['data' => [['id' => 'dummyTxHash']]],
        expectedBody: ['id' => 'dummyTxHash']
    );
});

it('validates the response', function () {
    $this->expectException(Exception::class);

    $this->assertResponse(
        method: 'GET',
        path: 'receipts/dummyTxHash',
        callback: function (ArkClient $client) {
            return $client->receipts()->get('dummyTxHash');
        },
        response: ['data' => []],
    );
});
