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

namespace ArkEcosystem\Tests\ArkClient\API\One;

use ArkEcosystem\Tests\ArkClient\TestCase;

/**
 * @coversNothing
 */
class LoaderTest extends TestCase
{
    /** @test */
    public function can_status()
    {
        // Act...
        $response = $this->getClient()->api('Loader')->status();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_sync()
    {
        // Act...
        $response = $this->getClient()->api('Loader')->sync();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_autoconfigure()
    {
        // Act...
        $response = $this->getClient()->api('Loader')->autoconfigure();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
