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
 * This is the businesses resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Businesses extends AbstractAPI
{
    /**
     * Get all businesses.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->get('businesses', $query);
    }

    /**
     * Get a business by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function show(string $id): ?array
    {
        return $this->get("businesses/{$id}");
    }

    /**
     * Get all bridgechains for the given business.
     *
     * @param string $id
     * @param array  $query
     *
     * @return array
     */
    public function bridgechains(string $id, array $query = []): ?array
    {
        return $this->get("businesses/{$id}/bridgechains", $query);
    }

    /**
     * Filter all businesses by the given parameters.
     *
     * @param array $parameters
     *
     * @return array
     */
    public function search(array $parameters): ?array
    {
        return $this->post('businesses/search', $parameters);
    }
}
