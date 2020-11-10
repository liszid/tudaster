<?php

declare(strict_types=1);

namespace Samples;

class sTables {
    const HOME_USERS = array(
        "tableId" => "tableHomeUsers",
        "tableRoot" => "Users",
        "data" => array(
            "userId" => "Id",
            "thumbnail" => "Ikon",
            "nameLast" => "Vezetéknév",
            "nameFirst" => "Keresztnév",
            "contSite" => "Telephely",
            "contEmail" => "E-mail",
            "contPhone" => "Telefon"
        ),
        "button" => array()
    );

    const ADMIN_USERS = array(
        "tableId" => "tableAdminUsers",
        "tableRoot" => "Administrative/Users",
        "data" => array(
            "userId" => "Id",
            "nameUser" => "Felhasználó",
            "nameLast" => "Vezetéknév",
            "nameFirst" => "Keresztnév",
            "contSite" => "Telephely",
            "contEmail" => "E-mail",
            "contPhone" => "Telefon"
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
            "groupId" => "Id",
            "groupName" => "Név",
            "groupDesc" => "Leírás",
            "mngGroups" => "mG",
            "mngUsers" => "mU",
            "mngMembers" => "mM",
            "mngTools" => "mT",
            "canUsers" => "cUs",
            "canCompany" => "cC",
            "canKnowledge" => "cK",
            "canUsername" => "cUn",
            "canPassword" => "cP",
            "canHardware" => "cH",
            "canSoftware" => "cS",
            "canEdit" => "cE",
            "canLogin" => "cL"
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
            "groupMemberId" => "Id",
            "groupName" => "Csoportnév",
            "groupDesc" => "Csoport leírás",
            "nameUser" => "Felhasználónév"
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

	$returnString = '<table id="'.$data['tableId'].'" class="table table-striped display responsive" style="width:100%"><thead><tr>';

        foreach ($data['data'] as $key => $value) {
            $returnString .= '<th class="'.((strcmp($key, array_key_first($data['data'])) === 0)? 'all': 'no-sort').'"><center>'.$value.'</center></th>';
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
                $returnString .= '<td class="align-baseline"><center>'.(( strcmp($key, 'thumbnail'))? $i[$key] : '<i class="fa fa-'.$i[$key].'" aria-hidden="true"> </i>').'</center></td>';
            }

            if (count($data['button']) > 0) {
                foreach ($data['button'] as $b) {
                    $returnString .= '<td class="align-baseline"><center><a class="btn btn-'.$b['color'].'" role="button" data-link="'.$data['tableRoot'].'/'.$b['action'].'" data-post="'.$i[array_key_first($data['data'])].'" data-toggle="modal" data-target="#modalBox"><i class="fa fa-'.$b['fa'].'" aria-hidden="true"></i></a></center></td>';
                }
            }

            $returnString .= '</tr>';
        }

        $returnString .= '</tbody><tfoot><tr>';

        foreach ($data['data'] as $key => $value) {
            $returnString .= '<th><center>'.$value.'</center></th>';
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
