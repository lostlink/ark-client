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

namespace ArkEcosystem\Client\API\One;

use ArkEcosystem\Client\API\AbstractResource;
use ArkEcosystem\Client\Http\Response;

/**
 * This is the loader resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Loader extends AbstractResource
{
    /**
     * Get the loader status.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function status(): Response
    {
        return $this->request->get('api/loader/status');
    }

    /**
     * Get the loader syncing status.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function sync(): Response
    {
        return $this->request->get('api/loader/status/sync');
    }

    /**
     * Get the loader configuration.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function autoconfigure(): Response
    {
        return $this->request->get('api/loader/autoconfigure');
    }
}
