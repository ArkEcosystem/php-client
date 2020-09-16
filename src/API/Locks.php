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
 * This is the locks resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Locks extends AbstractAPI
{
    /**
     * Get all locks.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->get('locks', $query);
    }

    /**
     * Get a locks by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function show(string $id): ?array
    {
        return $this->get("locks/{$id}");
    }

    /**
     * Filter all locks by the given parameters.
     *
     * @param array $parameters
     *
     * @return array
     */
    public function search(array $parameters): ?array
    {
        return $this->post('locks/search', $parameters);
    }

    /**
     * Filter all unlocked locks by the given parameters.
     *
     * @param array $parameters
     *
     * @return array
     */
    public function unlocked(array $parameters): ?array
    {
        return $this->post('locks/unlocked', $parameters);
    }
}
