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
 * @author Brian Faust <hello@brianfaust.me>
 */
class Transactions extends AbstractResource
{
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(): Response
    {
        return $this->get('transactions');
    }

    /**
     * @param array $payload
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function create(array $payload): Response
    {
        return $this->post('transactions', $payload);
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function get(string $id): Response
    {
        return $this->get("transactions/{$id}");
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function allUnconfirmed(): Response
    {
        return $this->get('transactions/unconfirmed');
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getUnconfirmed(string $id): Response
    {
        return $this->get("transactions/unconfirmed/{$id}");
    }

    /**
     * @param array $payload
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function search(array $payload): Response
    {
        return $this->post('transactions/search', $payload);
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function types(): Response
    {
        return $this->get('transactions/types');
    }
}
