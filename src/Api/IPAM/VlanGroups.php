<?php

namespace Rconfig\NetBox\Api\IPAM;

use Rconfig\NetBox\Api\AbstractApi;

class VlanGroups extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params = [])
    {
        return $this->post("/ipam/vlan-groups/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function remove($id, $params = [])
    {
        return $this->delete("/ipam/vlan-groups/" . $id . "/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($id, $params = [])
    {
        return $this->put("/ipam/vlan-groups/" . $id . "/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->get("/ipam/vlan-groups/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($id, $params = [])
    {
        return $this->get("/ipam/vlan-groups/" . $id . "/", $params);
    }
}
