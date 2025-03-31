<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Blocks extends AbstractAPI
{
    /**
     * Get all blocks.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->requestGet('blocks', $query);
    }

    /**
     * Get a block by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function get(string $id): ?array
    {
        return $this->requestGet("blocks/{$id}");
    }

    /**
     * Get the first block.
     *
     * @return array
     */
    public function first(): ?array
    {
        return $this->requestGet('blocks/first');
    }

    /**
     * Get the last block.
     *
     * @return array
     */
    public function last(): ?array
    {
        return $this->requestGet('blocks/last');
    }

    /**
     * Get all transactions by the given block.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function transactions(string $id, array $query = []): ?array
    {
        return $this->requestGet("blocks/{$id}/transactions", $query);
    }
}
