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
use ArkEcosystem\Client\Http\Response;

/**
 * This is the wallets resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Wallets extends AbstractResource
{
    /**
     * Get all wallets.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function all(): Response
    {
        return $this->get('wallets');
    }

    /**
     * Get all wallets sorted by balance in descending order.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function top(): Response
    {
        return $this->get('wallets/top');
    }

    /**
     * Get a wallet by the given id.
     *
     * @param string $id
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function show(string $id): Response
    {
        return $this->get("wallets/{$id}");
    }

    /**
     * Get all transactions for the given wallet.
     *
     * @param string $id
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function transactions(string $id): Response
    {
        return $this->get("wallets/{$id}/transactions");
    }

    /**
     * Get all transactions sent by the given wallet.
     *
     * @param string $id
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function transactionsSent(string $id): Response
    {
        return $this->get("wallets/{$id}/transactions/sent");
    }

    /**
     * Get all transactions received by the given wallet.
     *
     * @param string $id
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function transactionsReceived(string $id): Response
    {
        return $this->get("wallets/{$id}/transactions/received");
    }

    /**
     * Get all votes by the given wallet.
     *
     * @param string $id
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function votes(string $id): Response
    {
        return $this->get("wallets/{$id}/votes");
    }

    /**
     * Filter all wallets by the given criteria.
     *
     * @param array $criteria
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function search(array $criteria): Response
    {
        return $this->post('wallets/search', $criteria);
    }
}
