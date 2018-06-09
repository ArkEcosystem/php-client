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

class Blocks extends AbstractAPI
{
    /**
     * @param array $query
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(array $query = []): Collection
    {
        return $this->get('api/blocks', $query);
    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function show(string $id): Collection
    {
        return $this->get('api/blocks/get', compact('id'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function epoch(): Collection
    {
        return $this->get('api/blocks/getEpoch');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fee(): Collection
    {
        return $this->get('api/blocks/getFee');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fees(): Collection
    {
        return $this->get('api/blocks/getFees');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function height(): Collection
    {
        return $this->get('api/blocks/getHeight');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function milestone(): Collection
    {
        return $this->get('api/blocks/getMilestone');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function nethash(): Collection
    {
        return $this->get('api/blocks/getNethash');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function reward(): Collection
    {
        return $this->get('api/blocks/getReward');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function status(): Collection
    {
        return $this->get('api/blocks/getStatus');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function supply(): Collection
    {
        return $this->get('api/blocks/getSupply');
    }
}
