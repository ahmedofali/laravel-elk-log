<?php

namespace Elklog;

use Illuminate\Support\Facades\Facade;

class ElasticSearchClientFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'elkClient';
    }
}
