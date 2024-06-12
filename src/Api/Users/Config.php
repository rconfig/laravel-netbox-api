<?php

namespace Rconfig\NetBox\Api\Users;

use Rconfig\NetBox\Api\AbstractApi;

class Config extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->get("/users/users/", $params);
    }
}
