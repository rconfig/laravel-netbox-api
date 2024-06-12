<?php

namespace Rconfig\NetBox\Facades;

use Illuminate\Support\Facades\Facade;

class NetBoxApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'NetBoxApi';
    }
}
