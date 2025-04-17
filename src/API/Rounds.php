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
        return $this->requestGet('rounds', $query);
    }

    /**
     * Get a round by the given id.
     *
     * @param int $round_id
     *
     * @return array
     */
    public function get(int $round_id): ?array
    {
        return $this->requestGet("rounds/{$round_id}");
    }

    /**
     * Get the forging validators of a round by the given id.
     *
     * @param int $round_id
     *
     * @return array
     */
    public function validators(int $round_id): ?array
    {
        return $this->requestGet("rounds/{$round_id}/validators");
    }
}
