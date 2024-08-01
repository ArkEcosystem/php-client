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

use ArkEcosystem\Client\ArkClient;
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
    protected function assertResponse(string $method, string $path, callable $callback, array $expectedBody = [], string $expectedApi = 'api'): void
    {
        $hosts = [
            'api'          => 'https://dwallets-evm.mainsailhq.com/api',
            'transactions' => 'https://dwallets-evm.mainsailhq.com/tx/api',
            'evm'          => 'https://dwallets-evm.mainsailhq.com/evm',
        ];

        $mockHandler = new MockHandler([
            function (Request $request) use ($method, $path, $expectedBody, $hosts, $expectedApi) {
                $this->assertSame($method, $request->getMethod());
                $this->assertSame($hosts[$expectedApi] . '/' . $path, $request->getUri()->__toString());
                return new Response(200, [], json_encode($expectedBody));
            }
        ]);

        $client = new ArkClient(
            hostOrHosts: $hosts,
            handler: HandlerStack::create($mockHandler)
        );

        $this->assertSame($expectedBody, $callback($client));

    }
}
