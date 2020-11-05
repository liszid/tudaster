<?php

declare(strict_types=1);

namespace Samples\sElement;

use PreLoad\{
    Valid,
    Check,
    Log
};

class General
{
/*
 * Adds input element on Editor
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    public static function Input(array $array): string
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
    public static function Spinner(array $array): string
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
    public static function Add(array $array): string
    {
        if (isset($array['path'])) {
        //col-12 border border-light p-2 mb-2
            return '
                <div class="ml-auto">
                    <a class="btn btn-success" role="button" data-link="'.$array['path'].'/Add" data-post="0" data-toggle="modal" data-target="#modalBox">
                        <i class="fa fa-'.$array['fa'].'" aria-hidden="true"></i>
                        <span><b>Új hozzáadása</b></span>
                    </a>
                </div>';
        } else {
            return '';
        }
    }
}
