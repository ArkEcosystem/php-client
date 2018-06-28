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

namespace ArkEcosystem\Client\Contracts;

/**
 * This is the API contract interface.
 *
 * @author Brian Faust <brian@ark.io>
 */
interface API
{
    /**
     * Get the offset used for requests.
     *
     * @return int|null
     */
    public function getOffset(): ?int;

    /**
     * Set the offset used for requests.
     *
     * @param int $offset
     *
     * @return \ArkEcosystem\Client\Contracts\API
     */
    public function setOffset(int $offset): API;

    /**
     * Get the number of items returned per request.
     *
     * @return int|null
     */
    public function getLimit(): ?int;

    /**
     * Set the number of items returned per request.
     *
     * @param int $limit
     *
     * @return \ArkEcosystem\Client\Contracts\API
     */
    public function setLimit(int $limit): API;
}
