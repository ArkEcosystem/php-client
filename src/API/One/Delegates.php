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

use ArkEcosystem\Client\API\AbstractResource;
use ArkEcosystem\Client\Http\Response;

/**
 * This is the delegates resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Delegates extends AbstractResource
{
    /**
     * Get all accounts.
     *
     * @param string $query
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function all(array $query = []): Response
    {
        return $this->get('api/delegates', $query);
    }

    /**
     * Get a delegate by the given id.
     *
     * @param string $id
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function show(array $identifier): Response
    {
        return $this->get('api/delegates/get', $identifier);
    }

    /**
     * Count all delegates.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function count(): Response
    {
        return $this->get('api/delegates/count');
    }

    /**
     * Get the delegate registration fee.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function fee(): Response
    {
        return $this->get('api/delegates/fee');
    }

    /**
     * Get the forged totals by the given public key.
     *
     * @param string $generatorPublicKey
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function forgedByAccount(string $generatorPublicKey): Response
    {
        return $this->get('api/delegates/forging/getForgedByAccount', compact('generatorPublicKey'));
    }

    /**
     * Filter all delegates by the given criteria.
     *
     * @param string $query
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function search(string $query): Response
    {
        return $this->get('api/delegates/search', ['q' => $query]);
    }

    /**
     * Get all voters by the given public key.
     *
     * @param string $publicKey
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function voters(string $publicKey): Response
    {
        return $this->get('api/delegates/voters', compact('publicKey'));
    }

    /**
     * Get a list of the next forgers.
     *
     * @param string $generatorPublicKey
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function nextForgers(): Response
    {
        return $this->get('api/delegates/getNextForgers');
    }
}
