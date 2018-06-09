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

namespace ArkEcosystem\ArkClient;

use BitWasp\Bitcoin\Network\NetworkFactory;

class Config
{
    /** @var string */
    public $host;

    /** @var string */
    public $nethash;

    /** @var string */
    public $version;

    /** @var string */
    public $networkAddress;

    /** @var \BitWasp\Bitcoin\Network\NetworkFactory */
    public $network;

    /**
     * Create a new Ark client instance.
     *
     * @param int                                     $host
     * @param string                                  $nethash
     * @param string                                  $version
     * @param \BitWasp\Bitcoin\Network\NetworkFactory $networkAddress
     */
    public function __construct(string $host, string $nethash, string $version, string $networkAddress)
    {
        $this->host = $host;
        $this->nethash = $nethash;
        $this->version = $version;
        $this->networkAddress = $networkAddress;
        $this->network = NetworkFactory::create($networkAddress, '00', '00');
    }
}
