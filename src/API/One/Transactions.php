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
     * @param array $query
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(array $query = []): Response
    {
        return $this->get('api/transactions', $query);
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function show(string $id): Response
    {
        return $this->get('api/transactions/get', compact('id'));
    }

    /**
     * @param array $query
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function allUnconfirmed(array $query = []): Response
    {
        return $this->get('api/transactions/unconfirmed', $query);
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function showUnconfirmed(string $id): Response
    {
        return $this->get('api/transactions/unconfirmed/get', compact('id'));
    }
}
