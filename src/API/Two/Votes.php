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

namespace ArkEcosystem\Client\API\Two;

use ArkEcosystem\Client\API\AbstractAPI;

/**
 * This is the votes resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Votes extends AbstractAPI
{
    /**
     * Get all votes.
     *
     * @return array
     */
    public function all(): array
    {
        return $this->get('votes');
    }

    /**
     * Get a vote by the given id.
     *
     * @param string $id
     *
     * @return array
     */
    public function show(string $id): array
    {
        return $this->get("votes/{$id}");
    }
}
