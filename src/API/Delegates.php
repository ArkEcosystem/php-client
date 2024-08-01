<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Delegates extends AbstractAPI
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
        return $this->get('delegates', $query);
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
        return $this->get("delegates/{$id}");
    }

    /**
     * Get all blocks for the given delegate.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function blocks(string $id, array $query = []): ?array
    {
        return $this->get("delegates/{$id}/blocks", $query);
    }

    /**
     * Get all voters for the given delegate.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function voters(string $id, array $query = []): ?array
    {
        return $this->get("delegates/{$id}/voters", $query);
    }
}
