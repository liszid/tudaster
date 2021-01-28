<?php

declare(strict_types=1);

namespace Samples\sTables;

interface ACCESS_ACCESS
{
    const ACCESS_ACCESS = array(
        "tableId" => "tableAccessAccess",
        "tableRoot" => "Accesses/Access",
        "tableRole" => "canAccess",
        "data" => array(
            "accessId" => array("text" => "Id", "tooltip" => "")
            ,"hardwareId" => array("text" => "Eszk. Id", "tooltip" => "Eszköz azonosító")
            ,"hardwareName" => array("text" => "Név", "tooltip" => "Eszköz neve")
            ,"hardwareDesc" => array("text" => "Leírás", "tooltip" => "Eszköz leírása")
            ,"hardwareIP" => array("text" => "IP", "tooltip" => "Eszköz IP címe")
            ,"hardwareSwitch" => array("text" => "Switch", "tooltip" => "Switch IP címe")
            ,"hardwareSwitchPort" => array("text" => "Port", "tooltip" => "Switch Portja")
            ,"companyName" => array("text" => "Cég", "tooltip" => "Kihelyezettség - Cég")
            ,"companySiteName" => array("text" => "Telephely", "tooltip" => "Kihelyezettség - Telephely")
            ,"hardwareType" => array("text" => "Kategória", "tooltip" => "Kategória")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1)
            ,array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 3)
            ,array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 7)
        )
    );
}
