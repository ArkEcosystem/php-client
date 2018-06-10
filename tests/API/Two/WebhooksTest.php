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

namespace ArkEcosystem\Tests\Client\API\Two;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * This is the webhooks resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class WebhooksTest extends TestCase
{
    /** @test */
    public function all_should_be_successful()
    {
        $response = $this->getResource(2, 'webhooks')->all();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function create_should_be_successful()
    {
        $response = $this->getResource(2, 'webhooks')->create();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function show_should_be_successful()
    {
        $response = $this->getResource(2, 'webhooks')->show();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function update_should_be_successful()
    {
        $response = $this->getResource(2, 'webhooks')->update();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function delete_should_be_successful()
    {
        $response = $this->getResource(2, 'webhooks')->delete();

        $this->assertTrue($response->isSuccess());
    }
}
