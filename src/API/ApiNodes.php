<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class ApiNodes extends AbstractAPI
{
    /**
     * Get all available nodes serving APIs.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->get('api-nodes', $query);
    }
}
