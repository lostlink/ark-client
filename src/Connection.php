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

namespace Lostlink\Ark\Client;

use BadMethodCallException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Str;
use RuntimeException;

/**
 * This is the connection class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Connection
{
    /**
     * The Guzzle Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    public $httpClient;

    /**
     * Make a new connection instance.
     *
     * @param array                    $config
     * @param \GuzzleHttp\HandlerStack $handler
     */
    public function __construct(array $config, HandlerStack $handler = null)
    {
        $options = [
            'base_uri' => Str::finish($config['host'], '/'),
            'headers'  => [
                'Content-Type' => 'application/json',
            ],
        ];

        if ($handler instanceof HandlerStack) {
            $options['handler'] = $handler;
        }

        $this->httpClient = new Client($options);
    }

    /**
     * @param string $name
     * @param mixed  $args
     *
     * @throws BadMethodCallException
     *
     * @return ApiInterface
     */
    public function __call($name, $args)
    {
        try {
            return $this->api($name);
        } catch (RuntimeException $e) {
            throw new BadMethodCallException(sprintf('Undefined method called: "%s"', $name));
        }
    }

    /**
     * Make a new resource instance.
     *
     * @param string $name
     *
     * @return \Lostlink\Ark\Client\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $name  = ucfirst($name);
        $class = "Lostlink\\Ark\\Client\\API\\{$name}";

        if (! class_exists($class)) {
            throw new RuntimeException("Class [$class] does not exist.");
        }

        return new $class($this);
    }

    /**
     * Get the Guzzle client instance.
     *
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }
}
