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

use GuzzleHttp\HandlerStack;

/**
 * This is the builder class for ArkClient.
 */
class ArkClientBuilder
{
    private static ?self $instance = null;
    
    /**
     * The hosts to connect to.
     *
     * @var array{
     *  api: string,
     *  transactions: string|null,
     *  evm: string|null
     * }
     */
    private array $hosts;

    /**
     * The client configuration.
     *
     * @var array
     */
    private array $clientConfig = [];

    /**
     * The handler stack.
     *
     * @var HandlerStack|null
     */
    private ?HandlerStack $handler = null;

    /**
     * Get the singleton instance of the builder.
     *
     * @return self
     */
    private static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Initialize the builder with hosts.
     *
     * @param array{
     *  api: string,
     *  transactions: string|null,
     *  evm: string|null
     * } $hosts
     *
     * @return self
     */
    public static function withHosts(array $hosts): self
    {
        $instance = self::getInstance();
        $instance->hosts = $hosts;
        return $instance;
    }

    /**
     * Set the client configuration.
     *
     * @param array $clientConfig
     *
     * @return self
     */
    public function withClientConfig(array $clientConfig): self
    {
        $this->clientConfig = $clientConfig;
        return $this;
    }

    /**
     * Set the handler stack.
     *
     * @param HandlerStack $handler
     *
     * @return self
     */
    public function withHandler(HandlerStack $handler): self
    {
        $this->handler = $handler;
        return $this;
    }

    /**
     * Create a new ArkClient instance.
     *
     * @return ArkClient
     */
    public function create(): ArkClient
    {
        return new ArkClient($this->hosts, $this->clientConfig, $this->handler);
    }
}
