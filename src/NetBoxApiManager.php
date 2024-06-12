<?php

namespace Rconfig\NetBox;

use Illuminate\Support\Facades\Http;
use Rconfig\NetBox\Contracts\NetBoxApiInterface;

class NetBoxApiManager
{


    /** @var \Illuminate\Foundation\Application */
    protected $app;

    /** @var \Rconfig\NetBox\Client */
    protected $client;

    /** @var array */
    protected $sites = [];

    public function __construct($app)
    {
        $this->app = $app;



        // $this->client = new \GuzzleHttp\Client(config('netbox.client_options'));

        // dump(config('netbox'));

        // $response1 = Http::withOptions([
        //     'Authorization' => "Token " . config('netbox.sites.default.key'),
        // ])->get(config('netbox.sites.default.url') . '/status');
        // dump($response1->json());

        // $response2 = Http::withHeaders([
        //     'Authorization' => "Token " . config('netbox.sites.default.key'),
        // ])->get(config('netbox.sites.default.url') . '/dcim/devices');
        // // dump($response1->json());
        // dd($response2->json());
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->client, $method], $args);
    }

    /**
     * @param string $name
     * @return \Rconfig\NetBox\Client
     */
    protected function get($name)
    {
        return $this->sites[$name] ?? $this->resolve($name);
    }

    /**
     * @param string $name
     * @return \Rconfig\NetBox\Client
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        $this->client = new \Rconfig\NetBox\Client();
        $this->client->setOptions([
            'base_url' => $config['url'],
            'key' => $config['key']
        ]);

        return $this->client;
    }

    /**
     * @param string $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["netbox.sites.{$name}"];
    }

    // public function get($endpoint)
    // {
    //     $response = $this->client->get($endpoint);
    //     return json_decode($response->getBody(), true);
    // }

    // public function post($endpoint, $data)
    // {
    //     $response = $this->client->post($endpoint, ['json' => $data]);
    //     return json_decode($response->getBody(), true);
    // }

    // Add other HTTP methods as needed (put, delete, etc.)
}
