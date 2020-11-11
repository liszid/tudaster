<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

class sTables {
    const HOME_USERS = array(
        "tableId" => "tableHomeUsers",
        "tableRoot" => "Users",
        "data" => array(
            "userId" => array("text" => "Id", "tooltip" => ""),
            "thumbnail" => array("text" => "Ikon", "tooltip" => ""),
            "nameLast" => array("text" => "Vezetéknév", "tooltip" => ""),
            "nameFirst" => array("text" => "Keresztnév", "tooltip" => ""),
            "contSite" => array("text" => "Telephely", "tooltip" => ""),
            "contEmail" => array("text" => "E-mail", "tooltip" => ""),
            "contPhone" => array("text" => "Telefon", "tooltip" => "")
        ),
        "button" => array()
    );

    const ADMIN_USERS = array(
        "tableId" => "tableAdminUsers",
        "tableRoot" => "Administrative/Users",
        "data" => array(
            "userId" => array("text" => "Id", "tooltip" => ""),
            "nameUser" => array("text" => "Felhasználó", "tooltip" => ""),
            "nameLast" => array("text" => "Vezetéknév", "tooltip" => ""),
            "nameFirst" => array("text" => "Keresztnév", "tooltip" => ""),
            "contSite" => array("text" => "Telephely", "tooltip" => ""),
            "contEmail" => array("text" => "E-mail", "tooltip" => ""),
            "contPhone" => array("text" => "Telefon", "tooltip" => "")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'undo', 'action' => 'Reset'),
            array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete')
        )
    );

    const ADMIN_GROUPS = array(
        "tableId" => "tableAdminGroups",
        "tableRoot" => "Administrative/Groups",
        "data" => array(
            "groupId" => array("text" => "Id", "tooltip" => ""),
            "groupName" => array("text" => "Név", "tooltip" => ""),
            "groupDesc" => array("text" => "Leírás", "tooltip" => ""),
            "mngGroups" => array("text" => "mG", "tooltip" => "Csoport kezelési engedély"),
            "mngUsers" => array("text" => "mU", "tooltip" => "Felhasználó kezelési engedély"),
            "mngMembers" => array("text" => "mM", "tooltip" => "Csoport tagság kezelési engedély"),
            "mngTools" => array("text" => "mT", "tooltip" => "Adminisztratív eszköz kezelési engedély"),
            "canUsers" => array("text" => "cUs", "tooltip" => "Felhasználói adatok megtekintése"),
            "canCompany" => array("text" => "cC", "tooltip" => "Céges adatok megtekintése/kezelése"),
            "canKnowledge" => array("text" => "cK", "tooltip" => "Tudáscikkek megtekintése/kezelése"),
            "canUsername" => array("text" => "cUn", "tooltip" => "Hozzáféréseknél felhasználói nevek megtekintése/kezelése"),
            "canPassword" => array("text" => "cP", "tooltip" => "Hozzáféréseknél jelszavak megtekintése/kezelése"),
            "canHardware" => array("text" => "cH", "tooltip" => "Hardver adatok megtekintése/kezelése"),
            "canSoftware" => array("text" => "cS", "tooltip" => "Szoftver adatok megtekintése/kezelése"),
            "canEdit" => array("text" => "cE", "tooltip" => "Profil szerkesztési engedély"),
            "canLogin" => array("text" => "cL", "tooltip" => "Bejelentkezési engedély")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit'),
            array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete')
        )
    );

    const ADMIN_MEMBERSHIP = array(
        "tableId" => "tableAdminMembership",
        "tableRoot" => "Administrative/Membership",
        "data" => array(
            "groupMemberId" => array("text" => "Id", "tooltip" => ""),
            "groupName" => array("text" => "Csoportnév", "tooltip" => ""),
            "groupDesc" => array("text" => "Csoport leírás", "tooltip" => ""),
            "nameUser" => array("text" => "Felhasználónév", "tooltip" => "")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit')
        )
    );

/*
 * Displays Table using external data
 * @param $array array
 * @param $type string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.27
 */

    public static function Prompt(array $array, string $type): string
    {
	switch($type) {
	    case 'Admin_Users':
            return self::Generate($array, self::ADMIN_USERS);
            break;
	    case 'Admin_Groups':
            return self::Generate($array, self::ADMIN_GROUPS);
            break;
	    case 'Admin_Members':
            return self::Generate($array, self::ADMIN_MEMBERSHIP);
            break;
	    case 'Home_Users':
            return self::Generate($array, self::HOME_USERS);
            break;
	    default:
            break;
	}
    }

/*
 * Generates Table using both external and internal data
 * @param $array array
 * @param $data array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.27
 */
    private static function Generate(array $array, array $data): string
    {

        $returnString = '
            <table id="'.$data['tableId'].'" class="table table-striped display responsive" style="width:100%"><thead><tr>';

        foreach ($data['data'] as $key => $value) {
            $thTooltip = (isset($value['tooltip']) && Valid::vString($value['tooltip'])) ? "data-toggle='tooltip' data-placement='top' title='".$value['tooltip']."'" : "";
            $thClass = ((strcmp($key, array_key_first($data['data'])) === 0)? 'all': 'no-sort');

            $returnString .= '<th class="'.$thClass.'" '.$thTooltip.'><center>'.$value['text'].'</center></th>';
        }

        if (count($data['button']) > 0) {
    	    foreach ($data['button'] as $b) {
                $returnString .= '<th class="all">&nbsp;</th>';
    	    }
        }

        $returnString .= '</tr></thead><tbody>';

        foreach ($array as $i) {
            $returnString .= '<tr>';

            foreach ($data['data'] as $key => $value) {
                $tdTooltip = (isset($value['tooltip']) && Valid::vString($value['tooltip'])) ? "data-toggle='tooltip' data-placement='top' title='".$value['tooltip']."'" : "";
                $tdContent = (strcmp($key, 'thumbnail'))? $i[$key] : '<i class="fa fa-'.$i[$key].'" aria-hidden="true"> </i>';

                $returnString .= '<td class="align-baseline" '.$tdTooltip.'><center>'.$tdContent.'</center></td>';
            }

            if (count($data['button']) > 0) {
                foreach ($data['button'] as $b) {
                    $aData = '<a class="btn btn-'.$b['color'].'" role="button" data-link="'.$data['tableRoot'].'/'.$b['action'].'" data-post="'.$i[array_key_first($data['data'])].'" data-toggle="modal" data-target="#modalBox">';
                    if (isset($i['isDelete'])) {
                        if ((int)$i['isDelete'] === 0) {
                            $aData = '<a class="btn btn-secondary" role="button">';
                        }
                    }
                    $returnString .= '
                        <td class="align-baseline">
                            <center>
                                '.$aData.'
                                    <i class="fa fa-'.$b['fa'].'" aria-hidden="true"></i>
                                </a>
                            </center>
                        </td>';
                }
            }

            $returnString .= '</tr>';
        }

        $returnString .= '</tbody><tfoot><tr>';

        foreach ($data['data'] as $key => $value) {
            $thTooltip = (isset($value['tooltip']) && Valid::vString($value['tooltip'])) ? "data-toggle='tooltip' data-placement='top' title='".$value['tooltip']."'" : "";

            $returnString .= '<th '.$thTooltip.'><center>'.$value['text'].'</center></th>';
        }

        if (count($data['button']) > 0) {
    	    foreach ($data['button'] as $b) {
                $returnString .= '<th>&nbsp;</th>';
    	    }
        }

        $returnString .= '</tr></tfoot></table>';

        return $returnString;
    }
}
