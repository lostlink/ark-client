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
 * This is the votes resource test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \Lostlink\Ark\Client\API\Votes
 */
class VotesTest extends TestCase
{
    /** @test */
    public function all_calls_correct_url()
    {
        $this->assertResponse('GET', 'votes', function ($connection) {
            return $connection->votes()->all();
        });
    }

    /** @test */
    public function show_calls_correct_url()
    {
        $this->assertResponse('GET', 'votes/dummy', function ($connection) {
            return $connection->votes()->show('dummy');
        });
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return \Lostlink\Ark\Client\API\Votes::class;
    }
}
