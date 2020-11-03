<?php

declare(strict_types=1);

namespace Samples;

class sRoles
{
/*
 * Used to display Role settings at profile page
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Prompt(array $array = array()): string
    {
        if (isset($array)) {
            $prompt = '';
            $elementArray = array('canKnowledge', 'canUsername', 'canPassword', 'canHardware', 'canSoftware', 'canCompany', 'canEdit');

            foreach ($elementArray as $e) {
                $prompt .= sElement::User( array("desc" => sTranslate::TRANSLATE[sTranslate::ROLE[$e]['respective']]['navbar'], "data" => $array[$e]), "Activity");
            }

            return '
                <ul class="list-group">
                    <li class="list-group-item text-muted">
                        <i class="fa fa-dashboard"></i> Jogosultságok
                    </li>
                    '.$prompt.'
                </ul>';
        } else {
            return '';
        }

    }
}
