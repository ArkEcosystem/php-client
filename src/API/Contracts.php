<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Contracts extends AbstractAPI
{
    /**
     * Get all contracts.
     *
     * @return array
     */
    public function all(): ?array
    {
        return $this->requestGet('contracts');
    }

    /**
     * Get the node syncing status.
     *
     * @return array
     */
    public function abi(string $name, string $implementation): ?array
    {
        return $this->requestGet(sprintf('contracts/%s/%s/abi', $name, $implementation));
    }
}
