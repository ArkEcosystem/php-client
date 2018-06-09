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
class VoteTest extends TestCase
{
    /** @test */
    public function can_vote()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $delegate = '022cca9529ec97a772156c152a00aad155ee6708243e65c9d211a589cb5d43234d';
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->api('Vote')->vote($secret, $delegate, $secondSecret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_unvote()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $delegate = '022cca9529ec97a772156c152a00aad155ee6708243e65c9d211a589cb5d43234d';
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->api('Vote')->unvote($secret, $delegate, $secondSecret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
