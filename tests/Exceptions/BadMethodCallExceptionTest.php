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

namespace ArkEcosystem\Tests\Client\Exceptions;

use ArkEcosystem\Tests\Client\TestCase;
use ArkEcosystem\Client\Exceptions\BadMethodCallException;

/**
 * This is the BadMethodCallException test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Client\Exceptions\BadMethodCallException
 */
class BadMethodCallExceptionTest extends TestCase
{
    /** @test */
    public function it_should_throw_the_right_type()
    {
        $this->expectException(BadMethodCallException::class);

        throw new BadMethodCallException();
    }
}
