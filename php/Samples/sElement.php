<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

class sElement
{
/*
 * Collective function for General elements
 * @param $array array
 * @param $type string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function General(array $array = array(), string $type = ''): string
    {
        switch ($type) {
            case 'Spinner':
                return sElement\General::Spinner($array);
                break;
            case 'Add':
                return sElement\General::Add($array);
                break;
            case 'Input':
                return sElement\General::Input($array);
                break;
        }
    }

/*
 * Collective function for User related elements
 * @param $array array
 * @param $type string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function User(array $array = array(), string $type = ''): string
    {
        switch ($type) {
            case 'Activity':
                return sElement\User::Activity($array);
                break;
        }
    }

/*
 * Collective function for Administrative related elements
 * @param $array array
 * @param $type string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Admin(array $array = array(), string $type = ''): string
    {
        switch ($type) {
            default:
                break;
        }
    }

}
