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

namespace ArkEcosystem\ArkClient\API\Two;

use ArkEcosystem\ArkClient\API\AbstractAPI;
use Illuminate\Support\Collection;

class Blocks extends AbstractAPI
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection
    {
        return $this->get('blocks');
    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function get(string $id): Collection
    {
        return $this->get("blocks/{$id}");
    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function transactions(string $id): Collection
    {
        return $this->get("blocks/{$id}/transactions");
    }

    /**
     * @param array $payload
     *
     * @return \Illuminate\Support\Collection
     */
    public function search(array $payload): Collection
    {
        return $this->post('blocks/search', $payload);
    }
}
