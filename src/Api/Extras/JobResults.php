<?php

namespace Rconfig\NetBox\Api\Extras;

use Rconfig\NetBox\Api\AbstractApi;

class JobResults extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->get("/extras/job-results/", $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($id, $params = [])
    {
        return $this->get("/extras/job-results/" . $id . "/", $params);
    }
}
