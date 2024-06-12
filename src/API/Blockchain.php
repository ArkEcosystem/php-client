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

namespace ArkEcosystem\Client\API;

/**
 * This is the blocks resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Blockchain extends AbstractAPI
{
    /** 
     * Get blockchain information.
     *
     * @param array $query
     *
     * @return array
     */
    public function blockchain(): ?array
    {
        return $this->get('blockchain');
    }
}
