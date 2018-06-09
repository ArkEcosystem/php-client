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
class BlockTest extends TestCase
{
    /** @test */
    public function can_get_block()
    {
        // Arrange...
        $id = '2745982198389373800';

        // Act...
        $response = $this->getClient()->api('Blocks')->show($id);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_blocks()
    {
        // Act...
        $response = $this->getClient()->api('Blocks')->all();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_epoch()
    {
        // Act...
        $response = $this->getClient()->api('Blocks')->epoch();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_height()
    {
        // Act...
        $response = $this->getClient()->api('Blocks')->height();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_nethash()
    {
        // Act...
        $response = $this->getClient()->api('Blocks')->nethash();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_fee()
    {
        // Act...
        $response = $this->getClient()->api('Blocks')->fee();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_fees()
    {
        // Act...
        $response = $this->getClient()->api('Blocks')->fees();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_milestone()
    {
        // Act...
        $response = $this->getClient()->api('Blocks')->milestone();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_reward()
    {
        // Act...
        $response = $this->getClient()->api('Blocks')->reward();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_supply()
    {
        // Act...
        $response = $this->getClient()->api('Blocks')->supply();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_status()
    {
        // Act...
        $response = $this->getClient()->api('Blocks')->status();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
