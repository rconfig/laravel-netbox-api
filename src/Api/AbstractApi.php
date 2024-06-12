<?php

namespace Rconfig\NetBox\Api;

use Rconfig\NetBox\Api\ApiInterface;
use Rconfig\NetBox\Client;

abstract class AbstractApi implements ApiInterface
{
    /** @var \Rconfig\NetBox\Client */
    public $client;

    /**
     * AbstractApi constructor.
     * @param \Rconfig\NetBox\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function get($path, $parameters)
    {
        return $this->client->getHttpClient()->get($path, $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function post($path, $parameters)
    {
        return $this->client->getHttpClient()->post($path, $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function put($path, $parameters)
    {
        return $this->client->getHttpClient()->put($path, $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function delete($path, $parameters)
    {
        return $this->client->getHttpClient()->delete($path, $parameters);
    }
}
