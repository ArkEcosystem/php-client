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
 * This is the rounds resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Rounds extends AbstractAPI
{
    /**
     * Get all rounds.
     *
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->get('rounds', $query);
    }

    /**
     * Get a round by the given id.
     *
     * @param int $round_id
     *
     * @return array
     */
    public function show(int $round_id): ?array
    {
        return $this->get("rounds/{$round_id}");
    }

    /**
     * Get the forging delegates of a round by the given id.
     *
     * @param int $round_id
     *
     * @return array
     */
    public function delegates(int $round_id): ?array
    {
        return $this->get("rounds/{$round_id}/delegates");
    }
}
