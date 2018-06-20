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
use ArkEcosystem\Client\Http\Response;

/**
 * This is the peers resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Peers extends AbstractResource
{
    /**
     * Get all accounts.
     *
     * @param string $query
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function all(array $query = []): Response
    {
        return $this->request->get('api/peers', $query);
    }

    /**
     * Get a peer by the given IP address and port.
     *
     * @param string $ip
     * @param int    $port
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function show(string $ip, int $port): Response
    {
        return $this->request->get('api/peers/get', compact('ip', 'port'));
    }

    /**
     * Get the node version of the given peer.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function version(): Response
    {
        return $this->request->get('api/peers/version');
    }
}
