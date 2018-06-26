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

namespace ArkEcosystem\Client\API;

use ArkEcosystem\Client\Connection;
use ArkEcosystem\Client\Contracts\API;
use ArkEcosystem\Client\Http\Request;
use ArkEcosystem\Client\HttpClient\Message\ResponseMediator;
use GuzzleHttp\Client;

/**
 * This is the abstract resource class.
 *
 * @author Brian Faust <brian@ark.io>
 */
abstract class AbstractAPI implements API
{
    /**
     * The client connection.
     *
     * @var \ArkEcosystem\Client\Connection
     */
    public $connection;

    /**
     * The requested offset.
     *
     * @var null|int
     */
    protected $offset;

    /**
     * Number of items per request.
     *
     * @var null|int
     */
    protected $limit;

    /**
     * Create a new API class instance.
     *
     * @param \ArkEcosystem\Client\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * {@inheritdoc}
     */
    public function setOffset(int $offset): API
    {
        $this->offset = (null === $offset ? $offset : (int) $offset);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * {@inheritdoc}
     */
    public function setLimit(int $limit): API
    {
        $this->limit = (null === $limit ? $limit : (int) $limit);

        return $this;
    }

    /**
     * Send a GET request with query parameters.
     *
     * @param string $path
     * @param array  $parameters
     *
     * @return array|string
     */
    protected function get(string $path, array $parameters = [])
    {
        if (null !== $this->offset && !isset($parameters['offset'])) {
            $parameters['offset'] = $this->offset;
        }

        if (null !== $this->limit && !isset($parameters['limit'])) {
            $parameters['limit'] = $this->limit;
        }

        if (count($parameters) > 0) {
            $path .= '?'.http_build_query($parameters);
        }

        $response = $this->connection->getHttpClient()->get($path);

        return ResponseMediator::getContent($response);
    }

    /**
     * Send a POST request with JSON-encoded parameters.
     *
     * @param string $path
     * @param array  $parameters
     *
     * @return array|string
     */
    protected function post(string $path, array $parameters = [])
    {
        $response = $this->connection->getHttpClient()->post(
            $path,
            ['json' => $parameters]
        );

        return ResponseMediator::getContent($response);
    }
}
