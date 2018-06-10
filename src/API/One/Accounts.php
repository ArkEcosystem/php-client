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
 * This is the accounts resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Accounts extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(string $query): Response
    {
        return $this->get('api/accounts/getAllAccounts', $query);
    }

    /**
     * @param string $address
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function show(string $address): Response
    {
        return $this->get('api/accounts', compact('address'));
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function count(): Response
    {
        return $this->get('api/accounts/count');
    }

    /**
     * @param string $address
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function delegates(string $address): Response
    {
        return $this->get('api/accounts/delegates', compact('address'));
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function fee(): Response
    {
        return $this->get('api/accounts/delegates/fee');
    }

    /**
     * @param string $address
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function balance(string $address): Response
    {
        return $this->get('api/accounts/getBalance', compact('address'));
    }

    /**
     * @param string $address
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function publicKey(string $address): Response
    {
        return $this->get('api/accounts/getPublicKey', compact('address'));
    }

    /**
     * @param array $query
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function top(string $query): Response
    {
        return $this->get('api/accounts/top', $query);
    }
}
