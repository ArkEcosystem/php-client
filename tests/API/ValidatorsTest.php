<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\ArkClient;

it('calls correct url for all', function () {
    $this->assertResponse('GET', 'validators', function (ArkClient $client) {
        return $client->validators()->all();
    });
});

it('calls correct url for get', function () {
    $this->assertResponse('GET', 'validators/dummy', function (ArkClient $client) {
        return $client->validators()->get('dummy');
    });
});

it('calls correct url for blocks', function () {
    $this->assertResponse('GET', 'validators/dummy/blocks', function (ArkClient $client) {
        return $client->validators()->blocks('dummy');
    });
});

it('calls correct url for voters', function () {
    $this->assertResponse('GET', 'validators/dummy/voters', function (ArkClient $client) {
        return $client->validators()->voters('dummy');
    });
});
