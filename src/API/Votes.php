<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Votes extends AbstractAPI
{
    /**
     * Get all votes.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->requestGet('votes', $query);
    }

    /**
     * Get a vote by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function get(string $id): ?array
    {
        return $this->requestGet("votes/{$id}");
    }
}
