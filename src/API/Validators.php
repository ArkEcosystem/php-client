<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Validators extends AbstractAPI
{
    /**
     * Get all accounts.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->requestGet('validators', $query);
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
        return $this->requestGet("validators/{$id}");
    }

    /**
     * Get all blocks for the given validator.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function blocks(string $id, array $query = []): ?array
    {
        return $this->requestGet("validators/{$id}/blocks", $query);
    }

    /**
     * Get all voters for the given validator.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function voters(string $id, array $query = []): ?array
    {
        return $this->requestGet("validators/{$id}/voters", $query);
    }
}
