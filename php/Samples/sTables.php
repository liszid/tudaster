<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

class sTables implements
    sTables\ACCESS
    ,sTables\ADMIN
    ,sTables\COMPANY
    ,sTables\HARDWARE
    ,sTables\USERS
{
    const ACTIONS = array('Edit', 'View', 'Delete', 'Reset', 'Filter');

    const ENABLED_ACTIONS = array('View');

    const TABLES_BY_NAMES = array(
        "Admin_Users" => self::ADMIN_USERS
        ,"Admin_Groups" => self::ADMIN_GROUPS
        ,"Admin_Members" => self::ADMIN_MEMBERSHIP
        ,"Admin_Huntgroups" => self::ADMIN_HUNTGROUPS
        ,"Admin_Company_Site_Type" => self::ADMIN_COMPANY_SITE_TYPE
        ,"Admin_Knowledge_Type" => self::ADMIN_KNOWLEDGE_TYPE
        ,"Admin_Logs" => self::ADMIN_LOGS
        ,"Home_Users" => self::HOME_USERS
        ,"Company_Company" => self::COMPANY_COMPANY
        ,"Company_Site" => self::COMPANY_SITE
        ,"Company_Site_Filter" => self::COMPANY_SITE_FILTER
        ,"Hardware_Laptop" => self::HARDWARE_LAPTOP
        ,"Hardware_Computer" => self::HARDWARE_COMPUTER
        ,"Hardware_Printer" => self::HARDWARE_PRINTER
        ,"Hardware_Hardware" => self::HARDWARE_HARDWARE
        ,"Hardware_Server" => self::HARDWARE_SERVER
        ,"Hardware_Router" => self::HARDWARE_ROUTER
        ,"Hardware_Switch" => self::HARDWARE_SWITCH
        ,"Hardware_Access_Point" => self::HARDWARE_ACCESS_POINT
        ,"Hardware_Camera" => self::HARDWARE_CAMERA
        ,"Hardware_DVR_CCTV" => self::HARDWARE_DVR_CCTV
        ,"Hardware_Alarm" => self::HARDWARE_ALARM
        ,"Hardware_Telephony" => self::HARDWARE_TELEPHONY
        ,"Access_Access" => self::ACCESS_ACCESS
    );

/*
 * Displays Table using constants as visible data
 * , and all others are invisible but searchable
 * @param $array array
 * @param $type string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.27
 */

    public static function Prompt(array $array, string $type): string
    {
        return ((isset(self::TABLES_BY_NAMES[$type]))? self::Generate($array, self::TABLES_BY_NAMES[$type]) : '');
    }

/*
 * Generates Table using both external and constant data
 * @param $array array
 * @param $data array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.27
 * @update 2020.11.20
 */
    private static function Generate(array $array, array $data): string
    {
        $selectedKeys = array();
        $returnString = '
            <table id="'.$data['tableId'].'" class="table table-striped display responsive" style="width:100%"><thead><tr>';

        foreach ($data['data'] as $key => $value) {
            $thTooltip = (isset($value['tooltip']) && Valid::vString($value['tooltip'])) ? "data-toggle='tooltip' data-placement='top' title='".$value['tooltip']."'" : "";
            $thClass = ((strcmp($key, array_key_first($data['data'])) === 0)? 'all': 'no-sort');
            $returnString .= '<th class="'.$thClass.'" '.$thTooltip.'><center>'.$value['text'].'</center></th>';
        }

        if (count($data['button']) > 0) {
    	    foreach ($data['button'] as $b) {
                $returnString .= '<th class="all"></th>';
    	    }
        }

        if (count($array) > 0) {
            $diffKeys = array_diff(array_keys($array[0]), array_keys($data['data']));
            foreach ($diffKeys as $i) {
                if (! is_numeric($i)) {
                    $selectedKeys[] = $i;
                    $returnString .= '<th class="never"><center>'.$i.'</center></th>';
                }
            }

        }

        $returnString .= '</tr></thead><tbody>';

        foreach ($array as $i) {
            $returnString .= '<tr>';

            foreach ($data['data'] as $key => $value) {
                $tdTooltip = (isset($value['tooltip']) && Valid::vString($value['tooltip'])) ? "data-toggle='tooltip' data-placement='top' title='".$value['tooltip']."'" : "";
                $tdContent = (strcmp($key, 'userThumbnail'))? $i[$key] : '<i class="fa fa-'.$i[$key].'" aria-hidden="true"> </i>';
                if (isset($value['action'])) {
                    $tdAData = '<a class="badge badge-primary" role="button" data-link="'.$data['tableRoot'].'/'.$value['action'].'" data-post="'.$i[array_key_first($data['data'])].'" data-target="#modalBox">';
                    $tdContent = $tdAData . $tdContent . '</a>';
                }
                $returnString .= '<td class="align-baseline" '.$tdTooltip.'><center>'.$tdContent.'</center></td>';
            }

            if (count($data['button']) > 0) {
                foreach ($data['button'] as $b) {
                    $aTooltip = (isset($b['tooltip']) && Valid::vString($b['tooltip'])) ? "data-toggle='tooltip' data-placement='top' title='".$b['tooltip']."'" : "";
                    $aData = '<a class="btn btn-'.$b['color'].'" role="button" data-link="'.$data['tableRoot'].'/'.$b['action'].'" data-post="'.$i[array_key_first($data['data'])].'" data-target="#modalBox">';
                    if (
                        (
                            (
                                ! in_array($b['action'], self::ACTIONS)
                            ) || (
                                isset($i['isDelete'])
                                && ! (int)$i['isDelete']
                            ) || (
                                isset($i['userId'])
                                && isset($_SESSION['User']['userId'])
                                && $i['userId'] != $_SESSION['User']['userId']
                                && ! $_SESSION['User']['canAdministrative']
                            ) || (
                                isset($data['tableRole'])
                                && isset($b['level'])
                                && $b['level'] != 1
                                && ! $_SESSION['User']['canAdministrative']
                                && $_SESSION['User'][$data['tableRole']] <= $b['level']
                            )
                        ) && ! in_array($b['action'], self::ENABLED_ACTIONS)
                    ) {
                        $aData = '<a class="btn btn-secondary" role="button">';
                    }
                    $returnString .= '<td class="align-baseline" '.$aTooltip.'><center>'.$aData.'<i class="fa fa-'.$b['fa'].'" aria-hidden="true"></i></a></center></td>';
                }
            }

            if (count($selectedKeys) > 0) {
                foreach ($selectedKeys as $k) {
                    $returnString .= '<td class="align-baseline"><center>'.$i[$k].'</center></td>';
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
                $returnString .= '<th></th>';
    	    }
        }

        if (count($selectedKeys) > 0) {
            foreach ($selectedKeys as $i) {
                $returnString .= '<th class="hidden-column"><center>'.$i.'</center></th>';
            }

        }

        $returnString .= '</tr></tfoot></table>';

        return $returnString;
    }
}
