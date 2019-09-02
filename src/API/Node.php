<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Client.
 *
 * (c) Ark Ecosystem <info@ark.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ArkEcosystem\Client\API;

/**
 * This is the node resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Node extends AbstractAPI
{
    /**
     * Get the node status.
     *
     * @return array
     */
    public function status(): array
    {
        return $this->get('node/status');
    }

    /**
     * Get the node syncing status.
     *
     * @return array
     */
    public function syncing(): array
    {
        return $this->get('node/syncing');
    }

    /**
     * Get the node configuration.
     *
     * @return array
     */
    public function configuration(): array
    {
        return $this->get('node/configuration');
    }

    /**
     * Get the node crypto configuration.
     *
     * @return array
     */
    public function crypto(): array
    {
        return $this->get('node/configuration/crypto');
    }

    /**
     * Get the node fee statistics.
     *
     * @param int|null $days
     *
     * @return array
     */
    public function fees(int $days = null): array
    {
        return $this->get('node/fees', ['query' => ['days' => $days]]);
    }
}
