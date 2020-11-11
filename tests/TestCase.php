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

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\Connection;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * [$host description].
     *
     * @var string
     */
    protected $host = 'http://127.0.0.1:4002/api';

    /**
     * Perform a mocked request and assert its response.
     *
     * @param string     $method
     * @param string     $path
     * @param callable   $callback
     * @param array|null $expectedBody
     */
    protected function assertResponse(string $method, string $path, callable $callback, array $expectedBody = []): void
    {
        $mockHandler = new MockHandler([new Response(200, [], json_encode($expectedBody))]);

        $connection = new Connection([
            'host' => $this->host,
        ], HandlerStack::create($mockHandler));

        $this->assertSame($expectedBody, $callback($connection));
    }
}
