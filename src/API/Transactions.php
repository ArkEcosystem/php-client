<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Transactions extends AbstractAPI
{
    /**
     * Get all transactions.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->requestGet('transactions', $query);
    }

    /**
     * Create a new transaction.
     *
     * @param array $transactions
     *
     * @return array
     */
    public function create(array $transactions): ?array
    {
        return $this->withApi('transactions')->requestPost('transactions', compact('transactions'));
    }

    /**
     * Get a transaction by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function get(string $id): ?array
    {
        return $this->requestGet("transactions/{$id}");
    }

    /**
     * Get all unconfirmed transactions.
     *
     * @return array
     */
    public function allUnconfirmed(): ?array
    {
        return $this->withApi('transactions')->requestGet('transactions/unconfirmed');
    }

    /**
     * Get an unconfirmed transaction by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function getUnconfirmed(string $id): ?array
    {
        return $this->withApi('transactions')->requestGet("transactions/unconfirmed/{$id}");
    }

    /**
     * Get the pool configuration.
     *
     * @return array
     */
    public function configuration(): ?array
    {
        return $this->withApi('transactions')->requestGet('configuration');
    }
}
