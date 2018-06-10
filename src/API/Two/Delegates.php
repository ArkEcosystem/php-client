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
 * @author Brian Faust <hello@brianfaust.me>
 */
class Delegates extends AbstractResource
{
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(): Response
    {
        return $this->get('delegates');
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function get(string $id): Response
    {
        return $this->get("delegates/{$id}");
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function blocks(string $id): Response
    {
        return $this->get("delegates/{$id}/blocks");
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function voters(string $id): Response
    {
        return $this->get("delegates/{$id}/voters");
    }
}
