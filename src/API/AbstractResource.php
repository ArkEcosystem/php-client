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

use ArkEcosystem\Client\Connection;
use ArkEcosystem\Client\Http\Request;
use GuzzleHttp\Client;

/**
 * This is the abstract resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
abstract class AbstractResource
{
    /**
     * The client connection.
     *
     * @var \ArkEcosystem\Client\Connection
     */
    protected $connection;

    /**
     * The http request instance.
     *
     * @var \ArkEcosystem\Client\Http\Request
     */
    protected $request;

    /**
     * Create a new API class instance.
     *
     * @param \ArkEcosystem\Client\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->request    = new Request($connection);
    }
}
