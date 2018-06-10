<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Client.
 *
 * (c) Ark Ecosystem <info@ark.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\API\AbstractResource;
use ArkEcosystem\Client\Connection;
use ArkEcosystem\Client\ConnectionManager;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected $host = 'https://dexplorer.ark.io:8443/';

    protected function getConnection(): Connection
    {
        $connections = new ConnectionManager();

        return $connections->connect($this->host);
    }

    protected function getResource(int $version, string $resource): AbstractResource
    {
        return $this->getConnection()->version($version)->api($resource);
    }
}
