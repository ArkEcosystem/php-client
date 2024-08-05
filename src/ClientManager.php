<?php

declare(strict_types=1);

namespace ArkEcosystem\Client;

use InvalidArgumentException;

/**
 * This is the client manager class.
 */
class ClientManager
{
    /**
     * The default client instance.
     *
     * @var string
     */
    private $default = 'main';

    /**
     * The active client instances.
     *
     * @var array
     */
    private $clients = [];

    /**
     * Connect to the given client.
     *
     * @param string $host
     * @param string $name
     *
     * @return ArkClient
     */
    public function connect(string $host, string $name = 'main'): ArkClient
    {
        if (isset($this->clients[$name])) {
            throw new InvalidArgumentException("Client [$name] is already configured.");
        }

        $this->clients[$name] = new ArkClient($host);

        return $this->clients[$name];
    }

    /**
     * Disconnect from the given client.
     *
     * @param string|null $name
     */
    public function disconnect(string $name = null): void
    {
        $name = $name ?? $this->getDefaultClient();

        unset($this->clients[$name]);
    }

    /**
     * Get a client instance.
     *
     * @param string|null $name
     *
     * @return ArkClient
     */
    public function client(string $name = null): ArkClient
    {
        $name = $name ?? $this->getDefaultClient();

        if (! isset($this->clients[$name])) {
            throw new InvalidArgumentException("Client [$name] not configured.");
        }

        return $this->clients[$name];
    }

    /**
     * Get the default client name.
     *
     * @return string
     */
    public function getDefaultClient(): string
    {
        return $this->default;
    }

    /**
     * Set the default client name.
     *
     * @param string $name
     */
    public function setDefaultClient(string $name): void
    {
        $this->default = $name;
    }

    /**
     * Return all of the created clients.
     *
     * @return array[]
     */
    public function getClients(): array
    {
        return $this->clients;
    }
}
