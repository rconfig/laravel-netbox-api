<?php

namespace Rconfig\NetBox\Api\Extras;

use Rconfig\NetBox\Api\AbstractApi;

class Tags extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params = [])
    {
        return $this->post("/extras/tags/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function remove($id, $params = [])
    {
        return $this->delete("/extras/tags/" . $id . "/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($id, $params = [])
    {
        return $this->put("/extras/tags/" . $id . "/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->get("/extras/tags/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($id, $params = [])
    {
        return $this->get("/extras/tags/" . $id . "/", $params);
    }
}
