<?php

namespace Ahmedofali\LaravelElkLog;

use Illuminate\Support\Facades\Facade;

class ElkFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'elk';
    }
}
