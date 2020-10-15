<?php

use Devfaysal\SelectOption\SelectOption;

if (! function_exists('addOption')) {
    function addOption($select, $value, $display)
    {
        return SelectOption::createOption($select, $value, $display);
    }
}

if (! function_exists('getOptions')) {
    function getOptions($select)
    {
        return SelectOption::getOptions($select);
    }
}
