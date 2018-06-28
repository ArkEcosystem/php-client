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
 * This is the blocks resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Blocks extends AbstractAPI
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
        return $this->get('blocks', $query);
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
        return $this->get('blocks/get', compact('id'));
    }

    /**
     * Get the blockchain epoch.
     *
     * @return array
     */
    public function epoch(): array
    {
        return $this->get('blocks/getEpoch');
    }

    /**
     * Get the transfer transaction fee.
     *
     * @return array
     */
    public function fee(): array
    {
        return $this->get('blocks/getFee');
    }

    /**
     * Get a list of transaction fees.
     *
     * @return array
     */
    public function fees(): array
    {
        return $this->get('blocks/getFees');
    }

    /**
     * Get the blockchain height.
     *
     * @return array
     */
    public function height(): array
    {
        return $this->get('blocks/getHeight');
    }

    /**
     * Get the blockchain milestone.
     *
     * @return array
     */
    public function milestone(): array
    {
        return $this->get('blocks/getMilestone');
    }

    /**
     * Get the blockchain nethash.
     *
     * @return array
     */
    public function nethash(): array
    {
        return $this->get('blocks/getNethash');
    }

    /**
     * Get the blockchain reward.
     *
     * @return array
     */
    public function reward(): array
    {
        return $this->get('blocks/getReward');
    }

    /**
     * Get the blockchain status.
     *
     * @return array
     */
    public function status(): array
    {
        return $this->get('blocks/getStatus');
    }

    /**
     * Get the blockchain supply.
     *
     * @return array
     */
    public function supply(): array
    {
        return $this->get('blocks/getSupply');
    }
}
