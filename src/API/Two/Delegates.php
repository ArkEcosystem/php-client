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

class Delegates extends AbstractAPI
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection
    {
        return $this->get('delegates');
    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function get(string $id): Collection
    {
        return $this->get("delegates/{$id}");
    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function blocks(string $id): Collection
    {
        return $this->get("delegates/{$id}/blocks");
    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function voters(string $id): Collection
    {
        return $this->get("delegates/{$id}/voters");
    }
}
