<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Rounds extends AbstractAPI
{
    /**
     * Get all rounds.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->get('rounds', $query);
    }

    /**
     * Get a round by the given id.
     *
     * @param int $round_id
     *
     * @return array
     */
    public function show(int $round_id): ?array
    {
        return $this->get("rounds/{$round_id}");
    }

    /**
     * Get the forging delegates of a round by the given id.
     *
     * @param int $round_id
     *
     * @return array
     */
    public function delegates(int $round_id): ?array
    {
        return $this->get("rounds/{$round_id}/delegates");
    }
}
