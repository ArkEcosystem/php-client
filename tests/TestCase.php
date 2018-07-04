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
     * Create an API resource mock.
     *
     * @param int $version
     *
     * @return object
     */
    protected function getApiMock(int $version)
    {
        $httpClient = $this
            ->getMockBuilder(\Http\Client\HttpClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $httpClient
            ->expects($this->any())
            ->method('sendRequest');

        $connection = Connection::createWithHttpClient([
            'host'    => $this->host,
            'version' => $version,
        ], $httpClient);

        return $this
            ->getMockBuilder($this->getApiClass())
            ->setMethods(['get', 'post', 'postRaw', 'patch', 'delete', 'put', 'head'])
            ->setConstructorArgs([$connection])
            ->getMock();
    }

    /**
     * Perform a mocked request and assert its response.
     *
     * @param int        $version
     * @param string     $method
     * @param string     $path
     * @param callable   $callback
     * @param array|null $expected
     */
    protected function assertResponse(int $version, string $method, string $path, callable $callback, array $expected = null): void
    {
        $expected = $expected ?: ['success' => true];

        $api = $this->getApiMock($version);
        $api->expects($this->once())
            ->method(strtolower($method))
            ->with($path)
            ->will($this->returnValue($expected));

        $this->assertSame($expected, $callback($api));
    }
}
