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
 * This is the node resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Node extends AbstractResource
{
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function status(): Response
    {
        return $this->get('node/status');
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function syncing(): Response
    {
        return $this->get('node/syncing');
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function configuration(): Response
    {
        return $this->get('node/configuration');
    }
}
