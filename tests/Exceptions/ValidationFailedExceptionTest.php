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
use ArkEcosystem\Client\Exceptions\ValidationFailedException;

/**
 * This is the ValidationFailedException test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Client\Exceptions\ValidationFailedException
 */
class ValidationFailedExceptionTest extends TestCase
{
    /** @test */
    public function it_should_throw_the_right_type()
    {
        $this->expectException(ValidationFailedException::class);

        throw new ValidationFailedException();
    }
}
