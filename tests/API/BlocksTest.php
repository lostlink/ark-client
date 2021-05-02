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

namespace ArkEcosystem\Tests\Client\API;

use ArkEcosystem\Tests\Client\TestCase;

/**
 * This is the blocks resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \Lostlink\Ark\Client\API\Blocks
 */
class BlocksTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'blocks', function ($connection) {
            return $connection->blocks()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'blocks/dummy', function ($connection) {
            return $connection->blocks()->show('dummy');
        });
    }

    /** @test */
    public function first_calls_correct_url()
    {
        $this->assertResponse('GET', 'blocks/first', function ($connection) {
            return $connection->blocks()->first();
        });
    }

    /** @test */
    public function last_calls_correct_url()
    {
        $this->assertResponse('GET', 'blocks/last', function ($connection) {
            return $connection->blocks()->last();
        });
    }

    /** @test */
    public function transactions_calls_correct_url()
    {
        $this->assertResponse('GET', 'blocks/dummy/transactions', function ($connection) {
            return $connection->blocks()->transactions('dummy');
        });
    }
}
