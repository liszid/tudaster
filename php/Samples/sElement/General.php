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
 * Generates a form of input elements using multiple arrays
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.16
 */
    public static function Generate_Form(array $array):string
    {
        $returnString = '';
        $constData = (isset($array['constData'])) ? $array['constData'] : '';
        $staticData = (isset($array['staticData']))? $array['staticData'] : '';
        $valueData = (isset($array['valueData']))? $array['valueData'] : '';
        $selectData = (isset($array['selectData']))? $array['selectData'] : '';
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
                        $tempArray['value'] = (isset($valueData[$tempArray['data']]))? $valueData[$tempArray['data']] : '';
                    } else {
                        if ( ! strcmp($tempArray['tag'], 'Add')) {
                            $tempArray['value'] = '';
                        }
                    }
                    if ( ! strcmp($tempArray['tag'], 'View')) {
                        $tempArray['disabled'] = true;
                    }
                    if (! strcmp($tempArray['type'],'select') && is_array($selectData)) {
                        if (isset($selectData[$tempArray['data']])) {
                            $tempArray['select'] = $selectData[$tempArray['data']];
                        }
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
 * @since 2020.12.16
 */
    public static function Input(array $array): string
    {
        $returnString = '';
        $inputId = (isset($array['origo']) && isset($array['data'])) ? $array['origo'].'-'.$array['data'] : '';
        $labelDesc = (isset($array['desc'])) ? $array['desc'] : '';
        $inputValue = (isset($array['value'])) ? $array['value'] : '';
        $inputType = (isset($array['type'])) ? $array['type'] : '';
        $inputDisabled = (isset($array['disabled'])) ? ' disabled': '';
        $mustFill = (isset($array['must-fill'])) ? true: false;

        $input = '';

        if (
            ! strcmp($inputType, 'select')
            && isset($array['select'])
        ) {
            $input = '<select class="custom-select" id="'.$inputId.'"'.$inputDisabled.'>';
            foreach ($array['select'] as $i) {
                $input .= '<option value="'.$i['id'].'"'.((! strcmp((string)$inputValue, (string)$i['id'])) ? ' selected' : '').'>'.$i['name'].'</option>';
            }
            $input .= '</select>';
        } else {
            $input = '
                <input type="'.$inputType.'" class="form-control" id="'.$inputId.'" value="'.$inputValue.'"'.$inputDisabled.(($mustFill)?' data-must-fill="true"':'').'>
            ';
        }

        if (! strcmp($inputType, 'hidden')){
            $returnString = $input;
        } elseif (! strcmp($inputType, 'ckeditor')){
            if (empty($inputDisabled)){
                $returnString = '
                    <div class="form-group col-12 mx-0">
                        <textarea class="ckeditor col-12" id="'.$inputId.'">'.str_replace( '&', '&amp;', $inputValue).'</textarea>
                    </div>';
            } else {
                $returnString ='
                <div class="border m-1 col col-12">
                    '.$inputValue.'
                </div>';
            }

        } else {
            $returnString = '
                <div class="form-group row col-12 mx-0">
                    <label for="'.$inputId.'" class="col-sm-6 col-form-label text-left">'.$labelDesc.(($mustFill && ! isset($array['disabled']))?' *':'').'</label>
                    <div class="col-sm-6">
                        '.$input.'
                    </div>
                </div>';
        }

        return $returnString;
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
            return '
                <div class="ml-auto">
                    <a class="btn btn-success" role="button" data-link="'.$array['path'].'/Add"'.(($array['addNonModal'] === true)?'':' data-post="0" data-toggle="modal" data-target="#modalBox"').'>
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
