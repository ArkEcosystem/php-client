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
        return $this->get('transactions', $query);
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
        return $this->withApi('transactions')->post('transactions', compact('transactions'));
    }

    /**
     * Get a transaction by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function show(string $id): ?array
    {
        return $this->get("transactions/{$id}");
    }

    /**
     * Get all unconfirmed transactions.
     *
     * @return array
     */
    public function allUnconfirmed(): ?array
    {
        return $this->get('transactions/unconfirmed');
    }

    /**
     * Get an unconfirmed transaction by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function showUnconfirmed(string $id): ?array
    {
        return $this->get("transactions/unconfirmed/{$id}");
    }

    /**
     * Get the transaction pool configuration.
     *
     * @return array
     */
    public function configuration(): ?array
    {
        return $this->withApi('transactions')->get('configuration');
    }
}
