<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\API\Blocks;
use ArkEcosystem\Client\Client;
use GuzzleHttp\HandlerStack;

beforeEach(function () {
    $this->host = 'https://dwallets-evm.mainsailhq.com/api';
});

it('calls an api if exists', function () {
    $client = new Client(['api' => $this->host]);
    $actual = $client->blocks();
    expect($actual)->toBeInstanceOf(Blocks::class);
});

it('accepts hosts as an array', function () {
    $hosts = [
        'api'          => 'https://dwallets-evm.mainsailhq.com/api',
        'transactions' => 'https://dwallets-evm.mainsailhq.com/tx/api',
        'evm'          => 'https://dwallets-evm.mainsailhq.com/evm',
    ];
    $client = new Client($hosts);
    expect($client->connection->getHosts())->toBe($hosts);
});

it('does not accept hosts array without api', function () {
    $hosts = [
        'transactions' => 'https://dwallets-evm.mainsailhq.com/tx/api',
        'evm'          => 'https://dwallets-evm.mainsailhq.com/evm',
    ];
    new Client($hosts);
})->throws(\InvalidArgumentException::class);

it('accepts custom handler', function () {
    $handler = HandlerStack::create();
    $client  = new Client(hostOrHosts: $this->host, handler: $handler);
    expect($client->connection->getHttpClient()->getConfig('handler'))->toBe($handler);
});
