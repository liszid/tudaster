<?php

declare(strict_types=1);

namespace Samples;

class sNavbar
{
/*
 * Used for displaying items at navigation bar
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Prompt(array $array = array()): string
    {
        $dataToggle = '';
        $dataItems = '';

        if ($array['dataToggle'] === true) {
            $dataToggle .= 'data-link="'.$array['dataLink'].'" data-toggle="modal" data-target="#modalBox"';
        } elseif ($array['dataToggle'] === 'dropdown') {
            $dataToggle .= 'href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
            $dataItems .='<div class="dropdown-menu" aria-labelledby="nav-'.$array['dataLink'].'">';

            foreach ($array['dataItems'] as $i) {
                $dataItems .= '<a class="dropdown-item" data-link="'.$array['dataLink'].'/'.$i.'">'.sTranslate::Prompt($array['dataLink'].'/'.$i).'</a>';
            }

            $dataItems .= '</div>';
        } else {
            $dataToggle .= 'data-link="'.$array['dataLink'].'"';
        }

        return '
            <li class="nav-item'.$array['liClass'].'">
                <a class="nav-link hideOnSmall'.$array['aClass'].'" id="nav-'.$array['dataLink'].'" '.$dataToggle.'>
                    <i class="fa fa-fw fa-'.$array['faClass'].'"></i>
                    <span class="hideThis">'.$array['Desc'].'</span>
                </a>'.$dataItems .'
            </li>';
    }
}
