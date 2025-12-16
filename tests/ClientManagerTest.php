<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\ClientManager;
use ArkEcosystem\Client\Connection;

beforeEach(function () {
    $this->host = 'http://localhost';
});

it('should create a connection', function () {
    $manager = new ClientManager();
    $manager->connect($this->host, 'dummy-client');

    expect($manager->getClients())->toHaveKey('dummy-client');
});

it('should throw if a connection already exists', function () {
    $manager = new ClientManager();
    $manager->connect($this->host, 'dummy-client');

    $manager->connect($this->host, 'dummy-client');
})->throws(\InvalidArgumentException::class);

it('should remove a connection', function () {
    $manager = new ClientManager();
    $manager->connect($this->host, 'dummy-client');

    expect($manager->getClients())->toHaveKey('dummy-client');

    $manager->disconnect('dummy-client');

    expect($manager->getClients())->not->toHaveKey('dummy-client');
});

it('should return a connection', function () {
    $manager = new ClientManager();
    $manager->connect($this->host, 'dummy-client');

    expect($manager->client('dummy-client'))->toBeInstanceOf(Connection::class);
});

it('should throw if a connection does not exist', function () {
    $manager = new ClientManager();

    $manager->client('dummy-client');
})->throws(\InvalidArgumentException::class);

it('should return the default connection', function () {
    $manager = new ClientManager();

    expect($manager->getDefaultClient('main'))->toBe('main');
});

it('should set the default connection', function () {
    $manager = new ClientManager();
    $manager->setDefaultClient('dummy-client');

    expect($manager->getDefaultClient())->toBe('dummy-client');
});

it('should return all connections', function () {
    $manager = new ClientManager();
    $manager->connect($this->host, 'dummy-client-1');
    $manager->connect($this->host, 'dummy-client-2');
    $manager->connect($this->host, 'dummy-client-3');

    expect($manager->getClients())->toBeArray()->toHaveCount(3);
});
