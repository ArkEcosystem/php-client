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
 * This is the transactions resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
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
        return $this->post('transactions', compact('transactions'));
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
     * Get a list of valid transaction types.
     *
     * @return array
     */
    public function types(): ?array
    {
        return $this->get('transactions/types');
    }

    /**
     * Get the list of static transaction fees.
     *
     * @return array
     */
    public function fees(): ?array
    {
        return $this->get('transactions/fees');
    }
}
