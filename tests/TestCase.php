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

use ArkEcosystem\Client\Client;
use ArkEcosystem\Client\Config;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getClient(string $networkAddress = '1E')
    {
        $config = new Config(
            'http://167.114.29.33:4002/',
            '578e820911f24e039733b45e4882b73e301f813a0d2c31330dafda84534ffa23',
            '1.1.1',
            $networkAddress
        );

        return new Client($config);
    }
}
