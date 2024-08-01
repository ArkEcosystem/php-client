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
        return $this->get('wallets', $query);
    }

    /**
     * Get a wallet by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function show(string $id): ?array
    {
        return $this->get("wallets/{$id}");
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
        return $this->get("wallets/{$id}/transactions", $query);
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
        return $this->get("wallets/{$id}/transactions/sent", $query);
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
        return $this->get("wallets/{$id}/transactions/received", $query);
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
        return $this->get("wallets/{$id}/votes", $query);
    }

    /**
     * Get all wallets sorted by balance in descending order.
     *
     * @return array
     */
    public function top(): ?array
    {
        return $this->get('wallets/top');
    }
}
