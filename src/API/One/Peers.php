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
 * This is the peers resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Peers extends AbstractResource
{
    /**
     * @param string $query
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(array $query = []): Response
    {
        return $this->get('api/peers', $query);
    }

    /**
     * @param string $ip
     * @param int    $port
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function show(string $ip, int $port): Response
    {
        return $this->get('api/peers/get', compact('ip', 'port'));
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function version(): Response
    {
        return $this->get('api/peers/version');
    }
}
