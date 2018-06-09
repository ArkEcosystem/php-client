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

class Loader extends AbstractAPI
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function status(): Collection
    {
        return $this->get('api/loader/autoconfigure');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function sync(): Collection
    {
        return $this->get('api/loader/status');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function autoconfigure(): Collection
    {
        return $this->get('api/loader/status/sync');
    }
}
