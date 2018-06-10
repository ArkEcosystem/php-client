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
 * This is the wallets resource class.
 *
 * @author Brian Faust <hello@brianfaust.me>
 */
class Wallets extends AbstractResource
{
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(): Response
    {
        return $this->get('wallets');
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function top(): Response
    {
        return $this->get('wallets/top');
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function get(string $id): Response
    {
        return $this->get("wallets/{$id}");
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function transactions(string $id): Response
    {
        return $this->get("wallets/{$id}/transactions");
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function transactionsSent(string $id): Response
    {
        return $this->get("wallets/{$id}/transactions/sent");
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function transactionsReceived(string $id): Response
    {
        return $this->get("wallets/{$id}/transactions/received");
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function votes(string $id): Response
    {
        return $this->get("wallets/{$id}/votes");
    }

    /**
     * @param array $payload
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function search(array $payload): Response
    {
        return $this->post('wallets/search', $payload);
    }
}
