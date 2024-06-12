<?php

namespace Rconfig\NetBox\HttpClient;

use GuzzleHttp\Client;

class HttpClient implements HttpClientInterface
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    /** @var array */
    protected $options = [];

    /**
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        if (!isset($this->client)) {
            $this->client = new Client(config('netbox.client_options'));

            return $this->client;
        }

        return $this->client;
    }

    /**
     * @param $client
     * @return \GuzzleHttp\Client
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this->client;
    }

    /**
     * @param array $body
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($path = "", $query = [])
    {
        $response = $this->getClient()->request(
            'GET',
            config('netbox.sites.default.url') . $path,
            [
                'query' => $query
            ]
        );
        return json_decode((string)$response->getBody(), true);
    }

    /**
     * @param array $body
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($path = "", $body = [])
    {
        $response = $this->getClient()->request(
            'POST',
            config('netbox.sites.default.url') . $path,
            [
                'json' => $body
            ]
        );
        return json_decode((string)$response->getBody(), true);
    }

    /**
     * @param array $body
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put($path = "", $body = [])
    {
        $response = $this->getClient()->request(
            'PUT',
            config('netbox.sites.default.url') . $path,
            [
                'json' => $body
            ]
        );
        return json_decode((string)$response->getBody(), true);
    }

    /**
     * @param array $body
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($path = "", $body = [])
    {
        $response = $this->getClient()->request(
            'DELETE',
            config('netbox.sites.default.url') . $path,
            [
                'json' => $body
            ]
        );
        return json_decode((string)$response->getBody(), true);
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = array_merge($this->options, $options);
    }
}
