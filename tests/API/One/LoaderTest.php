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

namespace ArkEcosystem\Tests\Client\API\One;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * This is the loader resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class LoaderTest extends TestCase
{
    /** @test */
    public function status_should_be_successful()
    {
        $response = $this->getResource(1, 'loader')->status();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function sync_should_be_successful()
    {
        $response = $this->getResource(1, 'loader')->sync();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function autoconfigure_should_be_successful()
    {
        $response = $this->getResource(1, 'loader')->autoconfigure();

        $this->assertTrue($response->isSuccess());
    }
}
