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
 * This is the delegates resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class DelegatesTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/delegates', function ($mock) {
            return $mock->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/delegates/dummy', function ($mock) {
            return $mock->show('dummy');
        });
    }

    /** @test */
    public function blocks_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/delegates/dummy/blocks', function ($mock) {
            return $mock->blocks('dummy');
        });
    }

    /** @test */
    public function voters_calls_correct_url()
    {
        $this->assertResponse(2, 'GET', 'api/delegates/dummy/voters', function ($mock) {
            return $mock->voters('dummy');
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \ArkEcosystem\Client\API\Two\Delegates::class;
    }
}
