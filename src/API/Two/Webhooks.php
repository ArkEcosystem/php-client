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
 * This is the webhooks resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Webhooks extends AbstractResource
{
    /**
     * Get all webhooks.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function all(): Response
    {
        return $this->get('webhooks');
    }

    /**
     * Create a new webhook.
     *
     * @param array $payload
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function create(array $payload): Response
    {
        return $this->post('webhooks', $payload);
    }

    /**
     * Get the webhook by the given id.
     *
     * @param int $id
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function show(int $id): Response
    {
        return $this->get("webhooks/{$id}");
    }

    /**
     * Update the webhook by the given id.
     *
     * @param int   $id
     * @param array $payload
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function update(int $id, array $payload): Response
    {
        return $this->put("webhooks/{$id}", $payload);
    }

    /**
     * Delete the webhook by the given id.
     *
     * @param int $id
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function delete(int $id): Response
    {
        return $this->delete("webhooks/{$id}");
    }
}
