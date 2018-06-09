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

namespace ArkEcosystem\ArkClient\API\One;

use ArkEcosystem\ArkClient\API\AbstractAPI;
use Illuminate\Support\Collection;

class Peers extends AbstractAPI
{
    /**
     * @param string $query
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(array $query = []): Collection
    {
        return $this->get('api/peers', $query);
    }

    /**
     * @param string $ip
     * @param int    $port
     *
     * @return \Illuminate\Support\Collection
     */
    public function show(string $ip, int $port): Collection
    {
        return $this->get('api/peers/get', compact('ip', 'port'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function version(): Collection
    {
        return $this->get('api/peers/version');
    }
}
