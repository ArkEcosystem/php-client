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
class DelegateTest extends TestCase
{
    /** @test */
    public function can_count()
    {
        // Act...
        $response = $this->getClient()->api('Delegates')->count();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_search()
    {
        // Arrange...
        $q = 'yin';

        // Act...
        $response = $this->getClient()->api('Delegates')->search($q);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_voters()
    {
        // Arrange...
        $publicKey = '022cca9529ec97a772156c152a00aad155ee6708243e65c9d211a589cb5d43234d';

        // Act...
        $response = $this->getClient()->api('Delegates')->voters($publicKey);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegate()
    {
        // Act...
        $response = $this->getClient()->api('Delegates')->show([
            'publicKey' => '022cca9529ec97a772156c152a00aad155ee6708243e65c9d211a589cb5d43234d',
        ]);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates()
    {
        // Act...
        $response = $this->getClient()->api('Delegates')->all();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_fee()
    {
        // Act...
        $response = $this->getClient()->api('Delegates')->fee();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_forged_by_account()
    {
        // Arrange...
        $generatorPublicKey = '022cca9529ec97a772156c152a00aad155ee6708243e65c9d211a589cb5d43234d';

        // Act...
        $response = $this->getClient()->api('Delegates')->forgedByAccount($generatorPublicKey);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_delegate()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $username = str_random(34);
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->api('Delegates')->create($secret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_next_forgers()
    {
        // Act...
        $response = $this->getClient()->api('Delegates')->nextForgers();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    public function can_create_signed_transaction_object()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $username = str_random(8);
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->builder('Delegates')->create($secret, $username, $secondSecret);

        // Assert...
        $this->assertInstanceOf('stdClass', $response);
    }
}
