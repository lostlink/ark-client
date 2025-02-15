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

namespace Lostlink\Ark\Tests\Client\API;

use Lostlink\Ark\Tests\Client\TestCase;

/**
 * This is the peers resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \Lostlink\Ark\Client\API\Peers
 */
class PeersTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'peers', function ($connection) {
            return $connection->peers()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'peers/dummy', function ($connection) {
            return $connection->peers()->show('dummy');
        });
    }
}
