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

use ArkEcosystem\Client\API\AbstractAPI;

/**
 * This is the delegates resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Delegates extends AbstractAPI
{
    /**
     * Get all accounts.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): array
    {
        return $this->get('delegates', $query);
    }

    /**
     * Get a block by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function show(string $id): array
    {
        return $this->get("delegates/{$id}");
    }

    /**
     * Get all blocks for the given delegate.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function blocks(string $id, array $query = []): array
    {
        return $this->get("delegates/{$id}/blocks", $query);
    }

    /**
     * Get all voters for the given delegate.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function voters(string $id, array $query = []): array
    {
        return $this->get("delegates/{$id}/voters", $query);
    }
}
