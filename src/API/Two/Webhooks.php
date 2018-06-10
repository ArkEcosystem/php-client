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
 * This is the webhooks resource class.
 *
 * @author Brian Faust <hello@brianfaust.me>
 */
class Webhooks extends AbstractResource
{
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(): Response
    {
        return $this->get('webhooks');
    }

    /**
     * @param array $payload
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function create(array $payload): Response
    {
        return $this->post('webhooks', $payload);
    }

    /**
     * @param int $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function get(int $id): Response
    {
        return $this->get("webhooks/{$id}");
    }

    /**
     * @param int   $id
     * @param array $payload
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function update(int $id, array $payload): Response
    {
        return $this->put("webhooks/{$id}", $payload);
    }

    /**
     * @param int $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function delete(int $id): Response
    {
        return $this->delete("webhooks/{$id}");
    }
}
