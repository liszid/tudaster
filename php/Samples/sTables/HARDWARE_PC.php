<?php

declare(strict_types=1);

namespace Samples\sTables;

interface HARDWARE_PC
{
    const HARDWARE_PC = array(
        "tableId" => "tableHardwarePC",
        "tableRoot" => "Hardware/PC",
        "tableRole" => "canHardware",
        "data" => array(
            "hardwarePCId" => array("text" => "Id", "tooltip" => ""),
            "hardwareName" => array("text" => "Név", "tooltip" => "Eszköz neve"),
            "hardwareDesc" => array("text" => "Leírás", "tooltip" => "Eszköz leírása"),
            "hardwareIP" => array("text" => "IP", "tooltip" => "Eszköz IP címe"),
            "hardwareSwitch" => array("text" => "Switch", "tooltip" => "Switch IP címe"),
            "hardwareSwitchPort" => array("text" => "Port", "tooltip" => "Switch Portja"),
            "hardwarePCUse" => array("text" => "Használat", "tooltip" => "Számítógép felhasználási módja"),
            "hardwarePCType" => array("text" => "Típus", "tooltip" => "Számítógép típúsa"),
            "hardwarePCOS" => array("text" => "Op. Rendszer", "tooltip" => "Számítógép operációs rendszere")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1),
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 3),
            array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 7)
        )
    );
}
