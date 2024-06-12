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
 * This is the api nodes resource class.
 *
 * @author Alfonso Bribiesca <alfonso@ardenthq.com>
 */
class ApiNodes extends AbstractAPI
{
    /** 
     * Get all available nodes serving APIs.
     * 
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): ?array
    {
        return $this->get('api-nodes', $query);
    }
}
