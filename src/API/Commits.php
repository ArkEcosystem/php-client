<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Commits extends AbstractAPI
{
    /**
     * Takes a block number and returns the commit details.
     *
     * @param int $id
     *
     * @return array
     */
    public function get(int $number): ?array
    {
        return $this->requestGet("commits/{$number}");
    }
}
