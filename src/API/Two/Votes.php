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

use ArkEcosystem\Client\API\AbstractResource;
use GuzzleHttp\Psr7\Response;

/**
 * This is the votes resource class.
 *
 * @author Brian Faust <hello@brianfaust.me>
 */
class Votes extends AbstractResource
{
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function all(): Response
    {
        return $this->get('votes');
    }

    /**
     * @param string $id
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function get(string $id): Response
    {
        return $this->get("votes/{$id}");
    }
}
