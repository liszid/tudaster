<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Data\{
    dCombined
};

class sActivity
{

/**
 * Returns activity modul, or errorLog
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.05
 */
    public static function Prompt (array $array = array()): string
    {
        if (isset($array)) {
            $prompt = '';
            $elementArray = array(
                array("desc" => "Tudáscikk", "data" => $array['actKnowledges'])
                ,array("desc" => "Hozzáférés", "data" => $array['actAccesses'])
                ,array("desc" => "Hardver", "data" => $array['actHardwares'])
                ,array("desc" => "Ügyfél", "data" => $array['actCompanies'])
            );
            foreach ($elementArray as $e) {
                $prompt .= sElement::User( $e, "Activity");
            }
            return '
                <ul class="list-group">
                    <li class="list-group-item text-muted">
                        <i class="fa fa-dashboard"></i> Bejegyzések
                    </li>
                    '.$prompt.'
                </ul>';
        } else {
            return '';
        }
    }

/**
 * Returns activity array
 * @param $userId int
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.05
 */
    public static function Activity(int $userId = 0): array
    {
        return array(
            'actKnowledges' => '0',
            'actAccesses' => '0',
            'actHardwares' => '0',
            'actCompanies' => '0',
        );
    }

/**
 * Sets UserSession array
 * @param $array array
 * @author Liszi Dániel
 * @since 2020.11.04
 */
    public static function Set(array $array = array()): void
    {
        if (Valid::vArray($array)) {
            if (isset($_SESSION['User'])) {
                unset($_SESSION['User']);
            }
            $_SESSION['User'] = $array;
            $_SESSION['User']['Activity'] = self::Activity((int)$array['userId']);
        }
    }
}
