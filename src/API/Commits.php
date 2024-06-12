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
 * This is the commits resource class.
 *
 * @author Alfonso Bribiesca <alfonso@ardenthq.com>
 */
class Commits extends AbstractAPI
{
    /**
     * Takes a block height and returns the commit details.
     *
     * @param int $id
     *
     * @return array
     */
    public function show(int $height): ?array
    {
        return $this->get("commits/{$height}");
    }
}
