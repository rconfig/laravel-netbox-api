<?php

namespace Rconfig\NetBox;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Rconfig\NetBox\Api
 */
class Facade extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'NetBox';
    }
}
