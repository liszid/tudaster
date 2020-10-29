<?php

/**
 * Auto Loading Class by Liszi Dániel
 *
 * Default useage is to call the Directory or File mode of Loading
 * By default Css/Js/Favicon files are returned as <HTML tags> in string format,
 * while PHPs return Boolean on load.
 *
 * All rights reserved 2020-
 */

declare(strict_types=1);

namespace Load;

class _Include extends Loader implements iLoader
{
    public static function Directory(array $array): bool
    {
        return self::directoryLoad($array, 'include');
    }

    public static function File(array $array): bool
    {
        return self::fileLoad($array, 'include');
    }
}
