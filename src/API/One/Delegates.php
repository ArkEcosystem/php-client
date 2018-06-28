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

namespace ArkEcosystem\Client\API\One;

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
     * @param string $query
     *
     * @return array
     */
    public function all(array $query = []): array
    {
        return $this->get('delegates', $query);
    }

    /**
     * Get a delegate by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function show(array $id): array
    {
        return $this->get('delegates/get', $id);
    }

    /**
     * Count all delegates.
     *
     * @return array
     */
    public function count(): array
    {
        return $this->get('delegates/count');
    }

    /**
     * Get the delegate registration fee.
     *
     * @return array
     */
    public function fee(): array
    {
        return $this->get('delegates/fee');
    }

    /**
     * Get the forged totals by the given public key.
     *
     * @param string $generatorPublicKey
     *
     * @return array
     */
    public function forgedByAccount(string $generatorPublicKey): array
    {
        return $this->get('delegates/forging/getForgedByAccount', compact('generatorPublicKey'));
    }

    /**
     * Filter all delegates by the given criteria.
     *
     * @param string $query
     *
     * @return array
     */
    public function search(string $query): array
    {
        return $this->get('delegates/search', ['q' => $query]);
    }

    /**
     * Get all voters by the given public key.
     *
     * @param string $publicKey
     *
     * @return array
     */
    public function voters(string $publicKey): array
    {
        return $this->get('delegates/voters', compact('publicKey'));
    }

    /**
     * Get a list of the next forgers.
     *
     * @param string $generatorPublicKey
     *
     * @return array
     */
    public function nextForgers(): array
    {
        return $this->get('delegates/getNextForgers');
    }
}
