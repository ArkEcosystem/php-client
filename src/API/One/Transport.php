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
 * This is the transport resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Transport extends AbstractResource
{
    /**
     * Get a list of blocks by ids.
     *
     * @param array $ids
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function blocksCommon(array $ids): Response
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
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createTransactions(array $transactions): Response
    {
        return $this->post('peer/transactions', compact('transactions'));
    }
}
