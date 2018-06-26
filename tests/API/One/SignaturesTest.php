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
 * This is the signatures resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class SignaturesTest extends TestCase
{
    /** @test */
    public function fee_calls_correct_url()
    {
        $this->assertResponse(1, 'GET', 'signatures/fee', function ($mock) {
            return $mock->fee();
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\One\Signatures::class;
    }
}
