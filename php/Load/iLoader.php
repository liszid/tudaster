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

/**
 * Interface of Loading statements
 *
 * @author Liszi Dániel
 * @since 2020.10.15
 */
interface iLoader
{
    /**
    * Loads directory items with require
    * @param $array array
    * @return bool
    *
    * @author Liszi Dániel
    * @since 2020.10.15
    */
    public static function Directory(array $array): bool;

    /**
    * Loads files from different directories with require
    * @param $array array
    * @return bool
    *
    * @author Liszi Dániel
    * @since 2020.10.15
    */
    public static function File(array $array): bool;
}
