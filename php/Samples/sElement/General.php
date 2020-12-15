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
    public static function Generate_Form(array $array):string
    {
        $returnString = '';
        $constData = (isset($array['constData'])) ? $array['constData'] : '';
        $staticData = (isset($array['staticData']))? $array['staticData'] : '';
        $valueData = (isset($array['valueData']))? $array['valueData'] : '';
        if ( is_array($constData) && is_array($staticData)) {
            foreach($constData as $i) {
                 if (stristr($i['tags'],$staticData['tag'])) {
                    $tempArray = array_merge($i, $staticData);
                    if (
                        (
                            ! strcmp($tempArray['tag'], 'Edit')
                            || ! strcmp($tempArray['tag'], 'View')
                        )
                        && is_array($valueData)
                    ) {
                        $tempArray['value'] = (isset($valueData[$i['data']]))? $valueData[$i['data']] : '';
                    } else {
                        if ( ! strcmp($tempArray['tag'], 'Add')) {
                            $tempArray['value'] = '';
                        }
                    }
                    if ( ! strcmp($tempArray['tag'], 'View')) {
                        $tempArray['disabled'] = true;
                    }
                    $returnString .= self::Input($tempArray);
                }
            }
        }
        return $returnString;
    }

/*
 * Adds input element on Editor
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    public static function Input(array $array): string
    {
        $inputId = (isset($array['origo']) && isset($array['data'])) ? $array['origo'].'-'.$array['data'] : '';
        $labelDesc = (isset($array['desc'])) ? $array['desc'] : '';
        $inputValue = (isset($array['value'])) ? $array['value'] : '';
        $inputType = (isset($array['type'])) ? $array['type'] : '';
        $inputDisabled = (isset($array['disabled'])) ? ' disabled': '';
        $input = '';

        if (
            ! strcmp($inputType, 'select')
            && isset($array['select'])
        ) {
            $input = '<select class="custom-select" id="'.$inputId.'">';
            foreach ($array['select'] as $i) {
                $input .= '<option value="'.$i['id'].'"'.((! strcmp((string)$inputValue, (string)$i['id'])) ? ' selected' : '').$inputDisabled.'>'.$i['name'].'</option>';
            }
            $input .= '</select>';
        } else {
            $input = '
                <input type="'.$inputType.'" class="form-control" id="'.$inputId.'" value="'.$inputValue.'"'.$inputDisabled.'>';
        }

        return (
                (! strcmp($inputType, 'hidden'))
                    ?
                        $input
                    :'
                        <div class="form-group row col-12 mx-0">
                            <label for="'.$inputId.'" class="col-sm-6 col-form-label text-left">'.$labelDesc.'</label>
                            <div class="col-sm-6">
                                '.$input.'
                            </div>
                        </div>'
        );
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
                isset($array['x'])
                && ! empty($array['x'])
            ) {
                $location .= 'x='.$array['x'];
                if (
                    isset($array['y'])
                    && ! empty($array['y'])
                ) {
                    $location .= '&y='.$array['y'];
                    if (
                        isset($array['z'])
                        && ! empty($array['z'])
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
/*
 * Used to generate "Add New" button
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    public static function Button(array $array): string
    {
        if (isset($array['path'])) {
            return '
                <div class="ml-auto">
                    <a class="btn btn-'.$array['color'].'" role="button" data-link="'.$array['path'].'" data-post="'.$array['dp'].'" data-toggle="modal" data-target="#modalBox">
                        <i class="fa fa-'.$array['fa'].'" aria-hidden="true"></i>
                        <span>'.$array['text'].'</span>
                    </a>
                </div>';
        } else {
            return '';
        }
    }
}
