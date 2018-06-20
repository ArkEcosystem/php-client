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

namespace ArkEcosystem\Client\API\Two;

use ArkEcosystem\Client\API\AbstractResource;
use ArkEcosystem\Client\Http\Response;

/**
 * This is the blocks resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Blocks extends AbstractResource
{
    /**
     * Get all blocks.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function all(): Response
    {
        return $this->request->get('blocks');
    }

    /**
     * Get a block by the given id.
     *
     * @param string $id
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function show(string $id): Response
    {
        return $this->request->get("blocks/{$id}");
    }

    /**
     * Get all transactions by the given block.
     *
     * @param string $id
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function transactions(string $id): Response
    {
        return $this->request->get("blocks/{$id}/transactions");
    }

    /**
     * Filter all blocks by the given criteria.
     *
     * @param array $criteria
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function search(array $criteria): Response
    {
        return $this->request->post('blocks/search', $criteria);
    }
}
