<?php

namespace Rconfig\NetBox\Api\IPAM;

use Rconfig\NetBox\Api\AbstractApi;

class Aggregates extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params = [])
    {
        return $this->post("/ipam/aggregates/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function remove($id, $params = [])
    {
        return $this->delete("/ipam/aggregates/" . $id . "/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($id, $params = [])
    {
        return $this->put("/ipam/aggregates/" . $id . "/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->get("/ipam/aggregates/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($id, $params = [])
    {
        return $this->get("/ipam/aggregates/" . $id . "/", $params);
    }
}
