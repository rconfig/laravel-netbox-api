<?php

namespace Rconfig\NetBox\Api\DCMI;

use Rconfig\NetBox\Api\AbstractApi;

class Devices extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params = [])
    {
        return $this->post("/dcim/devices/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function remove($id, $params = [])
    {
        return $this->delete("/dcim/devices/" . $id . "/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($id, $params = [])
    {
        return $this->put("/dcim/devices/" . $id . "/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->get("/dcim/devices/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($id, $params = [])
    {
        return $this->get("/dcim/devices/" . $id . "/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function napalm($id, $params = [])
    {
        return $this->get("/dcim/devices/" . $id . "/napalm/", $params);
    }
}
