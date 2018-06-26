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
 * This is the signatures resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Signatures extends AbstractAPI
{
    /**
     * Get the second signature registration fee.
     *
     * @return array
     */
    public function fee(): array
    {
        return $this->get('signatures/fee');
    }
}
