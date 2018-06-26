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

namespace ArkEcosystem\Client\API\Two;

use ArkEcosystem\Client\API\AbstractAPI;

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
     * @return array
     */
    public function all(): array
    {
        return $this->get('api/transactions');
    }

    /**
     * Create a new transaction.
     *
     * @param array $transactions
     *
     * @return array
     */
    public function create(array $transactions): array
    {
        return $this->post('api/transactions', $transactions);
    }

    /**
     * Get a transaction by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function show(string $id): array
    {
        return $this->get("api/transactions/{$id}");
    }

    /**
     * Get all unconfirmed transactions.
     *
     * @return array
     */
    public function allUnconfirmed(): array
    {
        return $this->get('api/transactions/unconfirmed');
    }

    /**
     * Get an unconfirmed transaction by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function showUnconfirmed(string $id): array
    {
        return $this->get("api/transactions/unconfirmed/{$id}");
    }

    /**
     * Filter all transactions by the given parameters.
     *
     * @param array $parameters
     *
     * @return array
     */
    public function search(array $parameters): array
    {
        return $this->post('api/transactions/search', $parameters);
    }

    /**
     * Get a list of valid transaction types.
     *
     * @return array
     */
    public function types(): array
    {
        return $this->get('api/transactions/types');
    }
}
