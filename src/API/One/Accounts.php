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

class Accounts extends AbstractAPI
{
    /**
     * @param array $query
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(string $query): Collection
    {
        return $this->get('api/accounts/getAllAccounts', $query);
    }

    /**
     * @param string $address
     *
     * @return \Illuminate\Support\Collection
     */
    public function show(string $address): Collection
    {
        return $this->get('api/accounts', compact('address'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function count(): Collection
    {
        return $this->get('api/accounts/count');
    }

    /**
     * @param string $address
     *
     * @return \Illuminate\Support\Collection
     */
    public function delegates(string $address): Collection
    {
        return $this->get('api/accounts/delegates', compact('address'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fee(): Collection
    {
        return $this->get('api/accounts/delegates/fee');
    }

    /**
     * @param string $address
     *
     * @return \Illuminate\Support\Collection
     */
    public function balance(string $address): Collection
    {
        return $this->get('api/accounts/getBalance', compact('address'));
    }

    /**
     * @param string $address
     *
     * @return \Illuminate\Support\Collection
     */
    public function publicKey(string $address): Collection
    {
        return $this->get('api/accounts/getPublicKey', compact('address'));
    }

    /**
     * @param array $query
     *
     * @return \Illuminate\Support\Collection
     */
    public function top(string $query): Collection
    {
        return $this->get('api/accounts/top', $query);
    }
}
