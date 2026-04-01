<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class Node extends AbstractAPI
{
    /**
     * Get the node status.
     *
     * @return array
     */
    public function status(): ?array
    {
        return $this->requestGet('node/status');
    }

    /**
     * Get the node syncing status.
     *
     * @return array
     */
    public function syncing(): ?array
    {
        return $this->requestGet('node/syncing');
    }

    /**
     * Get the node configuration.
     *
     * @return array
     */
    public function configuration(): ?array
    {
        return $this->requestGet('node/configuration');
    }

    /**
     * Get the node crypto configuration.
     *
     * @return array
     */
    public function crypto(): ?array
    {
        return $this->requestGet('node/configuration/crypto');
    }

    /**
     * Get the node fee statistics.
     *
     * @param array $query
     *
     * @return array
     */
    public function fees(array $query = []): ?array
    {
        return $this->requestGet('node/fees', $query);
    }
}
