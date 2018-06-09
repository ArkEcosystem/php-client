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
class AccountTest extends TestCase
{
    /** @test */
    public function can_get_balance()
    {
        // Arrange...
        $address = 'DARiJqhogp2Lu6bxufUFQQMuMyZbxjCydN';

        // Act...
        $response = $this->getClient()->api('Accounts')->balance($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_publickey()
    {
        // Arrange...
        $address = 'DARiJqhogp2Lu6bxufUFQQMuMyZbxjCydN';

        // Act...
        $response = $this->getClient()->api('Accounts')->publicKey($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates()
    {
        // Arrange...
        $address = 'DARiJqhogp2Lu6bxufUFQQMuMyZbxjCydN';

        // Act...
        $response = $this->getClient()->api('Accounts')->delegates($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates_fee()
    {
        // Arrange...
        $address = 'DARiJqhogp2Lu6bxufUFQQMuMyZbxjCydN';

        // Act...
        $response = $this->getClient()->api('Accounts')->fee($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_delegates()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = str_random(34);
        $publicKey = '022cca9529ec97a772156c152a00aad155ee6708243e65c9d211a589cb5d43234d';
        $secondSecret = str_random(34);

        // Act...
        $response = $this->getClient()->api('Accounts')->createDelegates($secret, $publicKey, $secondSecret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_account()
    {
        // Arrange...
        $address = 'DARiJqhogp2Lu6bxufUFQQMuMyZbxjCydN';

        // Act...
        $response = $this->getClient()->api('Accounts')->show($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
