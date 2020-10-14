<?php

namespace Devfaysal\SelectOption;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Devfaysal\SelectOption\SelectOption
 */
class SelectOptionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-select-option';
    }
}
