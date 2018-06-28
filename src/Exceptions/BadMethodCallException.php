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

namespace ArkEcosystem\Client\Exceptions;

/**
 * This is the BadMethodCallException class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class BadMethodCallException extends \BadMethodCallException implements ExceptionInterface
{
}
