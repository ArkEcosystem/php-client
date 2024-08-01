<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Blockchain extends AbstractAPI
{
    /**
     * Get blockchain information.
     *
     * @param array $query
     *
     * @return array
     */
    public function blockchain(): ?array
    {
        return $this->get('blockchain');
    }
}
