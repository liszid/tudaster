<?php


declare(strict_types=1);

namespace Samples\sElement;

use PreLoad\{
    Valid,
    Check,
    Log
};

class User
{
/*
 * Used to display user activity elements
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Activity(array $array): string
    {
        return '
            <li class="list-group-item text-right">
                <span class="pull-left"><strong>'.$array['desc'].'</strong></span> '.$array['data'].'
            </li>
        ';
    }
}
