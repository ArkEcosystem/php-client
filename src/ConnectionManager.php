<?php

declare(strict_types=1);

namespace ArkEcosystem\Client;

use InvalidArgumentException;

class ConnectionManager
{
    /**
     * The default connection instance.
     *
     * @var string
     */
    private $default = 'main';

    /**
     * The active connection instances.
     *
     * @var array
     */
    private $connections = [];

    /**
     * Connect to the given connection.
     *
     * @param array  $config
     * @param string $name
     *
     * @return Connection
     */
    public function connect(array $config, string $name = 'main'): Connection
    {
        if (isset($this->connections[$name])) {
            throw new InvalidArgumentException("Connection [$name] is already configured.");
        }

        $this->connections[$name] = new Connection($config);

        return $this->connections[$name];
    }

    /**
     * Disconnect from the given connection.
     *
     * @param string|null $name
     */
    public function disconnect(string $name = null): void
    {
        $name = $name ?? $this->getDefaultConnection();

        unset($this->connections[$name]);
    }

    /**
     * Get a connection instance.
     *
     * @param string|null $name
     *
     * @return Connection
     */
    public function connection(string $name = null): Connection
    {
        $name = $name ?? $this->getDefaultConnection();

        if (! isset($this->connections[$name])) {
            throw new InvalidArgumentException("Connection [$name] not configured.");
        }

        return $this->connections[$name];
    }

    /**
     * Get the default connection name.
     *
     * @return string
     */
    public function getDefaultConnection(): string
    {
        return $this->default;
    }

    /**
     * Set the default connection name.
     *
     * @param string $name
     */
    public function setDefaultConnection(string $name): void
    {
        $this->default = $name;
    }

    /**
     * Return all of the created connections.
     *
     * @return array[]
     */
    public function getConnections(): array
    {
        return $this->connections;
    }
}
