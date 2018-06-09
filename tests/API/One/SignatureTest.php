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
class SignatureTest extends TestCase
{
    /** @test */
    public function can_get_fee()
    {
        // Act...
        $response = $this->getClient()->api('Signatures')->fee();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_signature()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->api('Signatures')->create($secret, $secondSecret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
