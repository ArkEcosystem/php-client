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
 * This is the peers resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Peers extends AbstractResource
{
    /**
     * Get all peers.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(): Response
    {
        return $this->get('peers');
    }

    /**
     * Get a peer by the given IP address.
     *
     * @param string $ip
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function show(string $ip): Response
    {
        return $this->get("peers/${ip}");
    }
}
