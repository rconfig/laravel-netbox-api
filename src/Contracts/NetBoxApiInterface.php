<?php

namespace Rconfig\NetBox\Contracts;

interface NetBoxApiInterface
{
    public function get($endpoint);
    public function post($endpoint, $data);
    // Add other HTTP methods as needed (put, delete, etc.)
}
