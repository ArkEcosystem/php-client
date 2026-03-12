<?php

declare(strict_types=1);

namespace ArkEcosystem\Tests\Client;

use ArkEcosystem\Client\Client;
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
    protected function assertResponse(
        string $method,
        string $path,
        callable $callback,
        array $expectedBody = [],
        string $expectedApi = 'api',
        array $response = [],
        ?array $expectedRequestBody = null
    ): void {
        $hosts = [
            'api'          => 'https://dwallets-evm.mainsailhq.com/api',
            'transactions' => 'https://dwallets-evm.mainsailhq.com/tx/api',
            'evm'          => 'https://dwallets-evm.mainsailhq.com/evm',
        ];

        $mockHandler = new MockHandler([
            function (Request $request) use ($method, $path, $response, $hosts, $expectedApi, $expectedRequestBody) {
                $this->assertSame($method, $request->getMethod());
                $this->assertSame($hosts[$expectedApi].'/'.$path, $request->getUri()->__toString());

                if ($expectedRequestBody !== null) {
                    $this->assertSame($expectedRequestBody, json_decode($request->getBody()->getContents(), true));
                }

                return new Response(200, [], json_encode($response));
            },
        ]);

        $client = new Client(
            hostOrHosts: $hosts,
            handler: HandlerStack::create($mockHandler)
        );

        $this->assertSame($expectedBody, $callback($client));
    }
}
