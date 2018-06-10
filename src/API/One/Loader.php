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

use ArkEcosystem\Client\API\AbstractResource;
use GuzzleHttp\Psr7\Response;

/**
 * This is the loader resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Loader extends AbstractResource
{
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function status(): Response
    {
        return $this->get('api/loader/status');
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function sync(): Response
    {
        return $this->get('api/loader/status/sync');
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function autoconfigure(): Response
    {
        return $this->get('api/loader/autoconfigure');
    }
}
