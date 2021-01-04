<?php

declare(strict_types=1);

namespace Samples\sTables;

interface HARDWARE_SECURITY
{
    const HARDWARE_SECURITY = array(
        "tableId" => "tableHardwareSecurity",
        "tableRoot" => "Hardware/Security",
        "tableRole" => "canHardware",
        "data" => array(
            "hardwareSecurityId" => array("text" => "Id", "tooltip" => ""),
            "hardwareName" => array("text" => "Név", "tooltip" => "Eszköz neve"),
            "hardwareDesc" => array("text" => "Leírás", "tooltip" => "Eszköz leírása"),
            "hardwareIP" => array("text" => "IP", "tooltip" => "Eszköz IP címe"),
            "hardwareSwitch" => array("text" => "Switch", "tooltip" => "Switch IP címe"),
            "hardwareSwitchPort" => array("text" => "Port", "tooltip" => "Switch Portja"),
            "hardwareSecurityUse" => array("text" => "Használat", "tooltip" => "Eszköz felhasználási módja"),
            "hardwareSecurityType" => array("text" => "Típus", "tooltip" => "Eszköz típúsa")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1),
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 3),
            array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 7)
        )
    );
}
