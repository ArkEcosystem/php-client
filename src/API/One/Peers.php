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

namespace ArkEcosystem\Client\API\One;

use ArkEcosystem\Client\API\AbstractAPI;

/**
 * This is the peers resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Peers extends AbstractAPI
{
    /**
     * Get all accounts.
     *
     * @param string $query
     *
     * @return array
     */
    public function all(array $query = []): array
    {
        return $this->get('api/peers', $query);
    }

    /**
     * Get a peer by the given IP address and port.
     *
     * @param string $ip
     * @param int    $port
     *
     * @return array
     */
    public function show(string $ip, int $port): array
    {
        return $this->get('api/peers/get', compact('ip', 'port'));
    }

    /**
     * Get the node version of the given peer.
     *
     * @return array
     */
    public function version(): array
    {
        return $this->get('api/peers/version');
    }
}
