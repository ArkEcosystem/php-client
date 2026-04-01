<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Wallets extends AbstractAPI
{
    /**
     * Get all wallets.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->requestGet('wallets', $query);
    }

    /**
     * Get a wallet by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function get(string $id): ?array
    {
        return $this->requestGet("wallets/{$id}");
    }

    /**
     * Get all transactions for the given wallet.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function transactions(string $id, array $query = []): ?array
    {
        return $this->requestGet("wallets/{$id}/transactions", $query);
    }

    /**
     * Get all transactions sent by the given wallet.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function sentTransactions(string $id, array $query = []): ?array
    {
        return $this->requestGet("wallets/{$id}/transactions/sent", $query);
    }

    /**
     * Get all transactions received by the given wallet.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function receivedTransactions(string $id, array $query = []): ?array
    {
        return $this->requestGet("wallets/{$id}/transactions/received", $query);
    }

    /**
     * Get all votes by the given wallet.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function votes(string $id, array $query = []): ?array
    {
        return $this->requestGet("wallets/{$id}/votes", $query);
    }

    /**
     * Get all wallets sorted by balance in descending order.
     *
     * @param array $query
     *
     * @return array
     */
    public function top(array $query = []): ?array
    {
        return $this->requestGet('wallets/top', $query);
    }

    /**
     * Get all tokens held by the given wallet.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function tokensFor(string $id, array $query = []): ?array
    {
        if (isset($query['whitelist'])) {
            return $this->requestPost("wallets/{$id}/tokens", $query);
        }

        return $this->requestGet("wallets/{$id}/tokens", $query);
    }

    /**
     * Get all tokens held by wallets.
     *
     * @param array $query
     *
     * @return array
     */
    public function tokens(array $query = []): ?array
    {
        if (isset($query['whitelist'])) {
            return $this->requestPost('wallets/tokens', $query);
        }

        return $this->requestGet('wallets/tokens', $query);
    }
}
