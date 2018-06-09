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

class Transport extends AbstractAPI
{
    /**
     * Get a list of blocks by ids.
     *
     * @param array $ids
     *
     * @return \Illuminate\Support\Collection
     */
    public function blocksCommon(array $ids): Collection
    {
        $ids = collect($ids)->transform(function (string $id) {
            return "'$id'";
        });

        return $this->get('peer/blocks/common', ['ids' => $ids->implode(',')]);
    }

    /**
     * Create a new transaction.
     *
     * @param array $transactions
     *
     * @return \Illuminate\Support\Collection
     */
    public function createTransactions(array $transactions): Collection
    {
        return $this->post('peer/transactions', compact('transactions'));
    }
}
