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

use ArkEcosystem\Client\Http\Response;
use ArkEcosystem\Tests\Client\TestCase;
use GrahamCampbell\GuzzleFactory\GuzzleFactory;

/**
 * This is the http response test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class ResponseTest extends TestCase
{
    /** @test */
    public function it_should_return_the_raw_body()
    {
        $response = $this->getResponse();

        $this->assertInternalType('string', $response->body());
    }

    /** @test */
    public function it_should_return_the_json_decoded_body()
    {
        $response = $this->getResponse();

        $this->assertInternalType('array', $response->json());
    }

    /** @test */
    public function it_should_return_a_header_value()
    {
        $response = $this->getResponse();

        $this->assertInternalType('string', $response->header('Content-Type'));
    }

    /** @test */
    public function it_should_return_a_status_code()
    {
        $response = $this->getResponse();

        $this->assertInternalType('integer', $response->status());
    }

    /** @test */
    public function it_should_return_a_boolean_for_is_success()
    {
        $response = $this->getResponse();

        $this->assertInternalType('boolean', $response->isSuccess());
    }

    /** @test */
    public function it_should_return_a_boolean_for_is_client_error()
    {
        $response = $this->getResponse();

        $this->assertInternalType('boolean', $response->isClientError());
    }

    /** @test */
    public function it_should_return_a_boolean_for_is_server_error()
    {
        $response = $this->getResponse();

        $this->assertInternalType('boolean', $response->isServerError());
    }

    private function getResponse(): Response
    {
        $client = GuzzleFactory::make([
            'base_uri' => 'https://httpbin.org/',
        ]);

        return new Response($client->get('get'));
    }
}
