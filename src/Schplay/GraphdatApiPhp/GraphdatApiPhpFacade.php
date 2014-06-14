<?php

namespace Schplay\GraphdatApiPhp;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for GraphdatApiPhp.
 *
 * @author David Myers <david.d.myers@gmail.com>
 */
class GraphdatApiPhpFacade extends Facade
{
    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor()
    {
        return 'graphdat';
    }
}
