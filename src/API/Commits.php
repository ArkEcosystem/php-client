<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Commits extends AbstractAPI
{
    /**
     * Takes a block height and returns the commit details.
     *
     * @param int $id
     *
     * @return array
     */
    public function show(int $height): ?array
    {
        return $this->get("commits/{$height}");
    }
}
