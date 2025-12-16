<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\ClientManager;
use ArkEcosystem\Client\Connection;
use GuzzleHttp\HandlerStack;

beforeEach(function () {
    $this->host = 'https://dwallets-evm.mainsailhq.com/api';
});

it('accepts hosts as an array', function () {
    $hosts = [
        'api'          => 'https://dwallets-evm.mainsailhq.com/api',
        'transactions' => 'https://dwallets-evm.mainsailhq.com/tx/api',
        'evm'          => 'https://dwallets-evm.mainsailhq.com/evm',
    ];

    $client = new Connection($hosts);

    expect($client->getHosts())->toBe($hosts);
});

it('does not accept hosts array without api', function () {
    $hosts = [
        'transactions' => 'https://dwallets-evm.mainsailhq.com/tx/api',
        'evm'          => 'https://dwallets-evm.mainsailhq.com/evm',
    ];

    expect(fn () => new Connection($hosts))->toThrow(\InvalidArgumentException::class);
});

it('accepts custom handler', function () {
    $handler = HandlerStack::create();

    $connection = new Connection(hostOrHosts: $this->host, handler: $handler);

    expect($connection->getHttpClient()->getConfig('handler'))->toBe($handler);
});

it('sets host', function () {
    $client = (new ClientManager())->connect($this->host);

    $newHost = 'https://new-host.com/api';
    $client->setHost($newHost, 'api');

    expect($client->getHosts()['api'])->toBe($newHost);
});

it('throws exception if host type is invalid', function () {
    $client = (new ClientManager())->connect($this->host);

    expect(fn () => $client->setHost('https://new-host.com/api', 'other'))->toThrow(\InvalidArgumentException::class);
});
