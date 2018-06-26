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
 * This is the accounts resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Accounts extends AbstractAPI
{
    /**
     * Get all accounts.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): array
    {
        return $this->get('api/accounts/getAllAccounts', $query);
    }

    /**
     * Get a account by the given address.
     *
     * @param string $address
     *
     * @return array
     */
    public function show(string $address): array
    {
        return $this->get('api/accounts', compact('address'));
    }

    /**
     * Count all accounts.
     *
     * @return array
     */
    public function count(): array
    {
        return $this->get('api/accounts/count');
    }

    /**
     * Get a delegate by the given address.
     *
     * @param string $address
     *
     * @return array
     */
    public function delegates(string $address): array
    {
        return $this->get('api/accounts/delegates', compact('address'));
    }

    /**
     * Get the delegate registration fee.
     *
     * @return array
     */
    public function fee(): array
    {
        return $this->get('api/accounts/delegates/fee');
    }

    /**
     * Get the balance for an account by the given address.
     *
     * @param string $address
     *
     * @return array
     */
    public function balance(string $address): array
    {
        return $this->get('api/accounts/getBalance', compact('address'));
    }

    /**
     * Get the public key for an account by the given address.
     *
     * @param string $address
     *
     * @return array
     */
    public function publicKey(string $address): array
    {
        return $this->get('api/accounts/getPublicKey', compact('address'));
    }

    /**
     * Get all wallets sorted by balance in descending order.
     *
     * @param array $query
     *
     * @return array
     */
    public function top(array $query = []): array
    {
        return $this->get('api/accounts/top', $query);
    }
}
