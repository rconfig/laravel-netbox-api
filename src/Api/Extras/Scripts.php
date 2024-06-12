<?php

namespace Rconfig\NetBox\Api\Extras;

use Rconfig\NetBox\Api\AbstractApi;

class Scripts extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->get("/extras/scripts/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($id, $params = [])
    {
        return $this->get("/extras/scripts/" . $id . "/", $params);
    }
}
