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
 * This is the blocks resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class BlocksTest extends TestCase
{
    /** @test */
    public function all_should_be_successful()
    {
        $response = $this->getResource(2, 'blocks')->all();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function show_should_be_successful()
    {
        $response = $this->getResource(2, 'blocks')->show();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function transactions_should_be_successful()
    {
        $response = $this->getResource(2, 'blocks')->transactions();

        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function search_should_be_successful()
    {
        $response = $this->getResource(2, 'blocks')->search();

        $this->assertTrue($response->isSuccess());
    }
}
