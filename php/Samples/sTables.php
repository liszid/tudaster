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
            "groupId" => array("text" => "Id", "tooltip" => "Tooltip on top"),
            "groupName" => array("text" => "Név", "tooltip" => "Tooltip on top"),
            "groupDesc" => array("text" => "Leírás", "tooltip" => "Tooltip on top"),
            "mngGroups" => array("text" => "mG", "tooltip" => "Tooltip on top"),
            "mngUsers" => array("text" => "mU", "tooltip" => "Tooltip on top"),
            "mngMembers" => array("text" => "mM", "tooltip" => "Tooltip on top"),
            "mngTools" => array("text" => "mT", "tooltip" => "Tooltip on top"),
            "canUsers" => array("text" => "cUs", "tooltip" => "Tooltip on top"),
            "canCompany" => array("text" => "cC", "tooltip" => "Tooltip on top"),
            "canKnowledge" => array("text" => "cK", "tooltip" => "Tooltip on top"),
            "canUsername" => array("text" => "cUn", "tooltip" => "Tooltip on top"),
            "canPassword" => array("text" => "cP", "tooltip" => "Tooltip on top"),
            "canHardware" => array("text" => "cH", "tooltip" => "Tooltip on top"),
            "canSoftware" => array("text" => "cS", "tooltip" => "Tooltip on top"),
            "canEdit" => array("text" => "cE", "tooltip" => "Tooltip on top"),
            "canLogin" => array("text" => "cL", "tooltip" => "Tooltip on top")
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
            <table id="'.$data['tableId'].'" class="table table-striped display responsive" style="width:100%">
                <thead>
                    <tr>';

        foreach ($data['data'] as $key => $value) {
            $thTooltip = (isset($value['tooltip']) && Valid::vString($value['tooltip'])) ? "data-toggle='tooltip' data-placement='top' title='".$value['tooltip']."'" : "";
            $thClass = ((strcmp($key, array_key_first($data['data'])) === 0)? 'all': 'no-sort');
            $returnString .= '
                <th class="'.$thClass.'" '.$thTooltip.'>
                    <center>
                        '.$value['text'].'
                    </center>
                </th>';
        }

        if (count($data['button']) > 0) {
    	    foreach ($data['button'] as $b) {
                $returnString .= '<th class="all">&nbsp;</th>';
    	    }
        }

        $returnString .= '
                    </tr>
                </thead>
            <tbody>';

        foreach ($array as $i) {
            $returnString .= '<tr>';

            foreach ($data['data'] as $key => $value) {
                $tdTooltip = (isset($value['tooltip']) && Valid::vString($value['tooltip'])) ? "data-toggle='tooltip' data-placement='top' title='".$value['tooltip']."'" : "";
                $tdContent = (strcmp($key, 'thumbnail'))? $i[$key] : '<i class="fa fa-'.$i[$key].'" aria-hidden="true"> </i>';
                $returnString .= '
                    <td class="align-baseline" '.$tdTooltip.'>
                        <center>
                            '.$tdContent.'
                        </center>
                    </td>';
            }

            if (count($data['button']) > 0) {
                foreach ($data['button'] as $b) {
                    $returnString .= '
                        <td class="align-baseline">
                            <center>
                                <a class="btn btn-'.$b['color'].'" role="button" data-link="'.$data['tableRoot'].'/'.$b['action'].'" data-post="'.$i[array_key_first($data['data'])].'" data-toggle="modal" data-target="#modalBox">
                                    <i class="fa fa-'.$b['fa'].'" aria-hidden="true"></i>
                                </a>
                            </center>
                        </td>';
                }
            }

            $returnString .= '</tr>';
        }

        $returnString .= '
                </tbody>
                <tfoot>
                    <tr>';

        foreach ($data['data'] as $key => $value) {
            $thTooltip = (isset($value['tooltip']) && Valid::vString($value['tooltip'])) ? "data-toggle='tooltip' data-placement='top' title='".$value['tooltip']."'" : "";
            $returnString .= '
                <th '.$thTooltip.'>
                    <center>
                        '.$value['text'].'
                    </center>
                </th>';
        }

        if (count($data['button']) > 0) {
    	    foreach ($data['button'] as $b) {
                $returnString .= '<th>&nbsp;</th>';
    	    }
        }

        $returnString .= '
                    </tr>
                </tfoot>
            </table>';

        return $returnString;
    }
}
