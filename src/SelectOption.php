<?php

namespace Devfaysal\SelectOption;

use Devfaysal\SelectOption\Models\Option;

class SelectOption
{
    public function indexView()
    {
        return config('laravel-select-option.views.index');
    }

    /**
     * Get the array of Selects defined in the config.
     *
     * @return array
     */
    public static function selects()
    {
        return config('laravel-select-option.selects', []);
    }

    public static function createOption($select, $value, $display)
    {
        return Option::updateOrCreate(
            ['select' => $select,'value' => $value],
            ['display' => $display]
        );
    }

    public static function getOptions($select)
    {
        return Option::where('select', $select)
                ->where('status', 1)
                ->get()
                ->pluck('display', 'value');
    }
}
