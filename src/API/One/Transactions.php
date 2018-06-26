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
 * This is the transactions resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Transactions extends AbstractAPI
{
    /**
     * Get all accounts.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): array
    {
        return $this->get('api/transactions', $query);
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
        return $this->get('api/transactions/get', compact('id'));
    }

    /**
     * Get all unconfirmed transactions.
     *
     * @param array $query
     *
     * @return array
     */
    public function allUnconfirmed(array $query = []): array
    {
        return $this->get('api/transactions/unconfirmed', $query);
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
        return $this->get('api/transactions/unconfirmed/get', compact('id'));
    }
}
