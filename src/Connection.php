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

namespace ArkEcosystem\Client;

use GuzzleHttp\Client;
use NumberFormatter;
use RuntimeException;

/**
 * This is the connection class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Connection
{
    /**
     * The connection configuration.
     *
     * @var \ArkEcosystem\Client\Config
     */
    public $config;

    /**
     * Make a new connection instance.
     *
     * @param \ArkEcosystem\Client\Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Make a new resource instance.
     *
     * @param string $name
     *
     * @return \ArkEcosystem\Client\API\AbstractResource
     */
    public function api(string $name): API\AbstractResource
    {
        $formatter = new NumberFormatter('en', NumberFormatter::SPELLOUT);
        $version   = ucfirst($formatter->format($this->config->get('api_version')));
        $class     = "ArkEcosystem\\Client\\API\\{$version}\\{$name}";

        if (!class_exists($class)) {
            throw new RuntimeException("Class [$class] does not exist.");
        }

        return new $class($this);
    }
}
