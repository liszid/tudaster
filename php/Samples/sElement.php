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
                return self::GeneralSpinner($array);
                break;
            case 'Add':
                return self::GeneralAdd($array);
                break;
            case 'Input':
                return self::GeneralInput($array);
                break;
        }
    }
/*
 * Adds input element on Editor
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    public static function GeneralInput(array $array): string
    {
        return '
            <div class="form-group row col-12 p-0">
                <label for="'.$array['origo'].'-'.$array['data'].'" class="col-sm-3 col-form-label">'.$array['desc'].'</label>
                <div class="col-sm-9">
                    <input type="'.$array['type'].'" class="form-control" id="'.$array['origo'].'-'.$array['data'].'" value="'.$array['value'].'">
                </div>
            </div>
        ';
    }
/*
 * Used to generate modal redirect spinner
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    private static function GeneralSpinner(array $array): string
    {
        if (Valid::vArray($array)) {
            $location = '';

            if (
                isset($array['x']) &&
                ! empty($array['x'])
            ) {
                $location .= 'x='.$array['x'];
                if (
                    isset($array['y']) &&
                    ! empty($array['y'])
                ) {
                    $location .= '&y='.$array['y'];
                    if (
                        isset($array['z']) &&
                        ! empty($array['z'])
                    ) {
                        $location .= '&z='.$array['z'];
                    }
                }
            } else {
                $location .= 'x=Home';
            }

            return '
                <div class="col-12">
                    <div class="spinner-grow">
                        <img style="display:none;" src="'.$GLOBALS['Path'].'images/placeholder.png" alt="Loading Animation" onload="setTimeout( function(){ Instance.initElmnt(\''.$location.'\'); $(\'[data-dismiss=modal]\').trigger({ type: \'click\' }); '.((isset($array['reload']) && $array['reload'])? 'window.location.reload();' : '').' }, 750);">
                    </div>
                </div>';
        } else {
            return '';
        }
    }

/*
 * Used to generate "Add New" button
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    private static function GeneralAdd(array $array): string
    {
        if (isset($array['path'])) {
            return '
                <div class="col-12 border border-light p-2 mb-2 d-flex">
                    <div class="ml-auto">
                        <a class="btn btn-success" role="button" data-link="'.$array['path'].'/Add" data-post="0" data-toggle="modal" data-target="#modalBox">
                            <i class="fa fa-'.$array['fa'].'" aria-hidden="true"></i>
                            <span><b>Új hozzáadása</b></span>
                        </a>
                    </div>
                </div>';
        } else {
            return '';
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
                return self::UserActivity($array);
                break;
        }
    }
/*
 * Used to display user activity elements
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function UserActivity(array $array): string
    {
        return '
            <li class="list-group-item text-right">
                <span class="pull-left"><strong>'.$array['desc'].'</strong></span> '.$array['data'].'
            </li>
        ';
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
