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

namespace ArkEcosystem\Client\API;

/**
 * This is the blocks resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
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
        return $this->get('blocks', $query);
    }

    /**
     * Get a block by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function show(string $id): ?array
    {
        return $this->get("blocks/{$id}");
    }

    /**
     * Get the first block.
     *
     * @return array
     */
    public function first(): ?array
    {
        return $this->get('blocks/first');
    }

    /**
     * Get the last block.
     *
     * @return array
     */
    public function last(): ?array
    {
        return $this->get('blocks/last');
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
        return $this->get("blocks/{$id}/transactions", $query);
    }
}
