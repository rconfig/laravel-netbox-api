<?php

namespace Rconfig\NetBox\Api\Secrets;

use Rconfig\NetBox\Api\AbstractApi;

class Session extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->post("/secrets/get-session-key/", $params);
    }
}
