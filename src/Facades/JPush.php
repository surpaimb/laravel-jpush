<?php

namespace Surpaimb\JPush\Facades;

use Illuminate\Support\Facades\Facade;

class JPush extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return "JPush";
    }
}