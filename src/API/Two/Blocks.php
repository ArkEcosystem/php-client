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
use GuzzleHttp\Psr7\Response;

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
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(): Response
    {
        return $this->get('blocks');
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
        return $this->get("blocks/{$id}");
    }

    /**
     * Get all transactions by the given block.
     *
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function transactions(string $id): Response
    {
        return $this->get("blocks/{$id}/transactions");
    }

    /**
     * Filter all blocks by the given criteria.
     *
     * @param array $criteria
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function search(array $criteria): Response
    {
        return $this->post('blocks/search', $criteria);
    }
}
