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

namespace ArkEcosystem\Tests\Client\Http;

use ArkEcosystem\Client\Connection;
use ArkEcosystem\Client\Http\Request;
use ArkEcosystem\Client\Http\Response;
use ArkEcosystem\Tests\Client\TestCase;
use GuzzleHttp\Client;

/**
 * This is the http request test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class RequestTest extends TestCase
{
    /** @test */
    public function get_returns_a_response()
    {
        $request = $this->getRequest();

        $this->assertInstanceOf(Response::class, $request->get('get'));
    }

    /** @test */
    public function post_returns_a_response()
    {
        $request = $this->getRequest();

        $this->assertInstanceOf(Response::class, $request->post('post'));
    }

    /** @test */
    public function put_returns_a_response()
    {
        $request = $this->getRequest();

        $this->assertInstanceOf(Response::class, $request->put('put'));
    }

    /** @test */
    public function patch_returns_a_response()
    {
        $request = $this->getRequest();

        $this->assertInstanceOf(Response::class, $request->patch('patch'));
    }

    /** @test */
    public function delete_returns_a_response()
    {
        $request = $this->getRequest();

        $this->assertInstanceOf(Response::class, $request->delete('delete'));
    }

    private function getRequest(): Request
    {
        $connection = new Connection('https://httpbin.org');

        return new Request($connection);
    }
}
