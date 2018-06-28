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

namespace ArkEcosystem\Client\API\One;

use ArkEcosystem\Client\API\AbstractAPI;

/**
 * This is the loader resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Loader extends AbstractAPI
{
    /**
     * Get the loader status.
     *
     * @return array
     */
    public function status(): array
    {
        return $this->get('loader/status');
    }

    /**
     * Get the loader syncing status.
     *
     * @return array
     */
    public function sync(): array
    {
        return $this->get('loader/status/sync');
    }

    /**
     * Get the loader configuration.
     *
     * @return array
     */
    public function autoconfigure(): array
    {
        return $this->get('loader/autoconfigure');
    }
}
