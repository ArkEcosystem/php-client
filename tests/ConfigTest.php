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

use ArkEcosystem\Client\Config;

/**
 * This is the config test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class ConfigTest extends TestCase
{
    /** @test */
    public function get()
    {
        $config = $this->setUpConfig();

        $this->assertSame($config->get('key'), 'value');
    }

    /** @test */
    public function set()
    {
        $config = $this->setUpConfig();

        $this->assertTrue($config->has('key'));
    }

    /** @test */
    public function has()
    {
        $config = $this->setUpConfig();

        $this->assertTrue($config->has('key'));
    }

    private function setUpConfig(): Config
    {
        return new Config(['key' => 'value']);
    }
}
