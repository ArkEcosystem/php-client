<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Client\Client;

it('calls the correct URL for get', function () {
    $this->assertResponse('GET', 'commits/1', function (Client $client) {
        return $client->commits()->get(1);
    });
});
