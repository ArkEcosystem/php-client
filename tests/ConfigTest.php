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

namespace ArkEcosystem\Tests\ArkClient;

use ArkEcosystem\ArkClient\Config;

/**
 * @coversNothing
 */
class ConfigTest extends TestCase
{
    /** @test */
    public function config_has_right_props()
    {
        $config = new Config(
            'http://167.114.29.33:4002/',
            'nethash',
            'version',
            '1E',
            'network'
        );

        $this->assertSame('http://167.114.29.33:4002/', $config->host);
        $this->assertSame('nethash', $config->nethash);
        $this->assertSame('version', $config->version);
        $this->assertSame('1E', $config->networkAddress);
        $this->assertInstanceOf('BitWasp\Bitcoin\Network\Network', $config->network);
    }
}
