<?php

namespace Rconfig\NetBox\Api\DCMI;

use Rconfig\NetBox\Api\AbstractApi;

class ConnectedDevices extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->get("/dcim/connected-device/", $params);
    }
}
