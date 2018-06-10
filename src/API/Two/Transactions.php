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

use ArkEcosystem\Client\API\AbstractResource;
use GuzzleHttp\Psr7\Response;

/**
 * This is the transactions resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Transactions extends AbstractResource
{
    /**
     * Get all transactions.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(): Response
    {
        return $this->get('transactions');
    }

    /**
     * Create a new transaction.
     *
     * @param array $transactions
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function create(array $transactions): Response
    {
        return $this->post('transactions', $transactions);
    }

    /**
     * Get a transaction by the given id.
     *
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function show(string $id): Response
    {
        return $this->get("transactions/{$id}");
    }

    /**
     * Get all unconfirmed transactions.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function allUnconfirmed(): Response
    {
        return $this->get('transactions/unconfirmed');
    }

    /**
     * Get an unconfirmed transaction by the given id.
     *
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getUnconfirmed(string $id): Response
    {
        return $this->get("transactions/unconfirmed/{$id}");
    }

    /**
     * Filter all transactions by the given criteria.
     *
     * @param array $criteria
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function search(array $criteria): Response
    {
        return $this->post('transactions/search', $criteria);
    }

    /**
     * Get a list of valid transaction types.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function types(): Response
    {
        return $this->get('transactions/types');
    }
}
