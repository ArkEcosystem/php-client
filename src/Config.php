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

/**
 * This is the config class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Config
{
    /**
     * The configuration storage.
     *
     * @var array
     */
    private $config = [];

    /**
     * Create a new config instance.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Get a value from the configuration.
     *
     * @param string     $key
     * @param null|mixed $default
     */
    public function get(string $key, $default = null)
    {
        return array_get($this->config, $key, $default);
    }

    /**
     * Set a value in the configuration.
     *
     * @param string $key
     * @param mixed  $value
     */
    public function set(string $key, $value): void
    {
        $this->config[$key] = $value;
    }

    /**
     * Determine if the given key exists in the configuration.
     *
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($this->config[$key]);
    }
}
