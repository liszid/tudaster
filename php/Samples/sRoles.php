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
            $elementArray = array(
                array("desc" => "Tudáscikk", "data" => $array['canKnowledge']),
                array("desc" => "Hozzáférés", "data" => $array['canUsername'].':'.$array['canPassword']),
                array("desc" => "Hardver", "data" => $array['canHardware']),
                array("desc" => "Szoftver", "data" => $array['canSoftware']),
                array("desc" => "Cég adat", "data" => $array['canCompany']),
                array("desc" => "Profil", "data" => $array['canEdit'])
            );
            foreach ($elementArray as $e) {
                $prompt .= sElement::User( $e, "Activity");
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