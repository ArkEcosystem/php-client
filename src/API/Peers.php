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

namespace ArkEcosystem\Client\API;

/**
 * This is the peers resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Peers extends AbstractAPI
{
    /**
     * Get all peers.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->get('peers', $query);
    }

    /**
     * Get a peer by the given IP address.
     *
     * @param string $ip
     *
     * @return array
     */
    public function show(string $ip): ?array
    {
        return $this->get("peers/{$ip}");
    }
}
