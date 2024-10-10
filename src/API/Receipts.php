<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

use Exception;

class Receipts extends AbstractAPI
{
    /**
     * Get all receipts (paginated).
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->get('receipts', $query);
    }

    /**
     * Get a receipt by the given transaction hash.
     *
     * @param string $txHash
     *
     * @return array
     */
    public function show(string $txHash): ?array
    {
        $result = $this->get('receipts', ['txHash' => $txHash])['data'];

        if (empty($result)) {
            throw new Exception(sprintf('No receipt found for transaction %s', $txHash));
        }

        return $result[0];
    }
}
