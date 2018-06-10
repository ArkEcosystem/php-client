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
 * This is the delegates resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Delegates extends AbstractResource
{
    /**
     * Get all accounts.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(): Response
    {
        return $this->get('delegates');
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
        return $this->get("delegates/{$id}");
    }

    /**
     * Get all blocks for the given delegate.
     *
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function blocks(string $id): Response
    {
        return $this->get("delegates/{$id}/blocks");
    }

    /**
     * Get all voters for the given delegate.
     *
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function voters(string $id): Response
    {
        return $this->get("delegates/{$id}/voters");
    }
}
