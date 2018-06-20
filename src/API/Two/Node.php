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

namespace ArkEcosystem\Client\API\Two;

use ArkEcosystem\Client\API\AbstractResource;
use ArkEcosystem\Client\Http\Response;

/**
 * This is the node resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Node extends AbstractResource
{
    /**
     * Get the node status.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function status(): Response
    {
        return $this->request->get('node/status');
    }

    /**
     * Get the node syncing status.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function syncing(): Response
    {
        return $this->request->get('node/syncing');
    }

    /**
     * Get the node configuration.
     *
     * @return \ArkEcosystem\Client\Http\Response
     */
    public function configuration(): Response
    {
        return $this->request->get('node/configuration');
    }
}
