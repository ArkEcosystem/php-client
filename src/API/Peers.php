<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

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
        return $this->requestGet('peers', $query);
    }

    /**
     * Get a peer by the given IP address.
     *
     * @param string $ip
     *
     * @return array
     */
    public function get(string $ip): ?array
    {
        return $this->requestGet("peers/{$ip}");
    }
}
