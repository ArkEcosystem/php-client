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
 * This is the delegates resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Delegates extends AbstractResource
{
    /**
     * @param string $query
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(array $query = []): Response
    {
        return $this->get('api/delegates', $query);
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function show(array $identifier): Response
    {
        return $this->get('api/delegates/get', $identifier);
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function count(): Response
    {
        return $this->get('api/delegates/count');
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function fee(): Response
    {
        return $this->get('api/delegates/fee');
    }

    /**
     * @param string $generatorPublicKey
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function forgedByAccount(string $generatorPublicKey): Response
    {
        return $this->get('api/delegates/forging/getForgedByAccount', compact('generatorPublicKey'));
    }

    /**
     * @param string $query
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function search(string $query): Response
    {
        return $this->get('api/delegates/search', ['q' => $query]);
    }

    /**
     * @param string $publicKey
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function voters(string $publicKey): Response
    {
        return $this->get('api/delegates/voters', compact('publicKey'));
    }

    /**
     * @param string $generatorPublicKey
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function nextForgers(): Response
    {
        return $this->get('api/delegates/getNextForgers');
    }
}
