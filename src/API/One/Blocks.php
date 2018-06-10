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
use GuzzleHttp\Psr7\Response;

/**
 * This is the blocks resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Blocks extends AbstractResource
{
    /**
     * Get all accounts.
     *
     * @param array $query
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(array $query = []): Response
    {
        return $this->get('api/blocks', $query);
    }

    /**
     * Get a block by the given id.
     *
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function show(string $id): Response
    {
        return $this->get('api/blocks/get', compact('id'));
    }

    /**
     * Get the blockchain epoch.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function epoch(): Response
    {
        return $this->get('api/blocks/getEpoch');
    }

    /**
     * Get the transfer transaction fee.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function fee(): Response
    {
        return $this->get('api/blocks/getFee');
    }

    /**
     * Get a list of transaction fees.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function fees(): Response
    {
        return $this->get('api/blocks/getFees');
    }

    /**
     * Get the blockchain height.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function height(): Response
    {
        return $this->get('api/blocks/getHeight');
    }

    /**
     * Get the blockchain milestone.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function milestone(): Response
    {
        return $this->get('api/blocks/getMilestone');
    }

    /**
     * Get the blockchain nethash.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function nethash(): Response
    {
        return $this->get('api/blocks/getNethash');
    }

    /**
     * Get the blockchain reward.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function reward(): Response
    {
        return $this->get('api/blocks/getReward');
    }

    /**
     * Get the blockchain status.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function status(): Response
    {
        return $this->get('api/blocks/getStatus');
    }

    /**
     * Get the blockchain supply.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function supply(): Response
    {
        return $this->get('api/blocks/getSupply');
    }
}
