<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Tokens extends AbstractAPI
{
    /**
     * Get all tokens.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        if (isset($query['whitelist'])) {
            return $this->requestPost('tokens', $query);
        }

        return $this->requestGet('tokens', $query);
    }

    /**
     * Get a token by contract address.
     *
     * @param string $address
     *
     * @return array
     */
    public function get(string $address): ?array
    {
        return $this->requestGet("tokens/{$address}");
    }

    /**
     * Get token holders for a given token.
     *
     * @param string $address
     * @param array  $query
     *
     * @return array
     */
    public function holders(string $address, array $query = []): ?array
    {
        return $this->requestGet("tokens/{$address}/holders", $query);
    }

    /**
     * Get token transfers for a given token.
     *
     * @param string $address
     * @param array  $query
     *
     * @return array
     */
    public function transfersByToken(string $address, array $query = []): ?array
    {
        return $this->requestGet("tokens/{$address}/transfers", $query);
    }

    /**
     * Get all token transfers.
     *
     * @param array $query
     *
     * @return array
     */
    public function transfers(array $query = []): ?array
    {
        return $this->requestGet('tokens/transfers', $query);
    }

    /**
     * Get the token whitelist.
     *
     * @param array $query
     *
     * @return array
     */
    public function whitelist(array $query = []): ?array
    {
        return $this->requestGet('tokens/whitelist', $query);
    }
}
