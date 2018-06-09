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

namespace ArkEcosystem\ArkClient\API\One;

use ArkEcosystem\ArkClient\API\AbstractAPI;
use Illuminate\Support\Collection;

class Delegates extends AbstractAPI
{
    /**
     * @param string $query
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(array $query = []): Collection
    {
        return $this->get('api/delegates', $query);
    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function show(array $identifier): Collection
    {
        return $this->get('api/delegates/get', $identifier);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function count(): Collection
    {
        return $this->get('api/delegates/count');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fee(): Collection
    {
        return $this->get('api/delegates/fee');
    }

    /**
     * @param string $generatorPublicKey
     *
     * @return \Illuminate\Support\Collection
     */
    public function forgedByAccount(string $generatorPublicKey): Collection
    {
        return $this->get('api/delegates/forging/getForgedByAccount', compact('generatorPublicKey'));
    }

    /**
     * @param string $query
     *
     * @return \Illuminate\Support\Collection
     */
    public function search(string $query): Collection
    {
        return $this->get('api/delegates/search', ['q' => $query]);
    }

    /**
     * @param string $publicKey
     *
     * @return \Illuminate\Support\Collection
     */
    public function voters(string $publicKey): Collection
    {
        return $this->get('api/delegates/voters', compact('publicKey'));
    }

    /**
     * @param string $generatorPublicKey
     *
     * @return \Illuminate\Support\Collection
     */
    public function nextForgers(): Collection
    {
        return $this->get('api/delegates/getNextForgers');
    }
}
