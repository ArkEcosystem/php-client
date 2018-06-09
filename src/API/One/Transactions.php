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

namespace ArkEcosystem\ArkClient\API\One;

use ArkEcosystem\ArkClient\API\AbstractAPI;
use Illuminate\Support\Collection;

class Transactions extends AbstractAPI
{
    /**
     * @param array $query
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(array $query = []): Collection
    {
        return $this->get('api/transactions', $query);
    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function show(string $id): Collection
    {
        return $this->get('api/transactions/get', compact('id'));
    }

    /**
     * @param array $query
     *
     * @return \Illuminate\Support\Collection
     */
    public function allUnconfirmed(array $query = []): Collection
    {
        return $this->get('api/transactions/unconfirmed', $query);
    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function showUnconfirmed(string $id): Collection
    {
        return $this->get('api/transactions/unconfirmed/get', compact('id'));
    }
}
