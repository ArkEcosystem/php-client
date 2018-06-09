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

namespace ArkEcosystem\ArkClient\API\Two;

use ArkEcosystem\ArkClient\API\AbstractAPI;
use Illuminate\Support\Collection;

class Statistics extends AbstractAPI
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function blockchain(): Collection
    {
        return $this->get('statistics/blockchain');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function transactions(): Collection
    {
        return $this->get('statistics/transactions');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function blocks(): Collection
    {
        return $this->get('statistics/blocks');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function votes(): Collection
    {
        return $this->get('statistics/votes');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function unvotes(): Collection
    {
        return $this->get('statistics/unvotes');
    }
}
