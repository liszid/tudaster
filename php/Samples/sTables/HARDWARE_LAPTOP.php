<?php

declare(strict_types=1);

namespace Samples\sTables;

interface HARDWARE_LAPTOP
{
    const HARDWARE_LAPTOP = array(
        "tableId" => "tableHardwareLaptop",
        "tableRoot" => "Hardware/Laptop",
        "tableRole" => "canHardware",
        "data" => array(
            "hardwareLaptopId" => array("text" => "Id", "tooltip" => ""),
            "hardwareName" => array("text" => "Név", "tooltip" => "Eszköz neve"),
            "hardwareDesc" => array("text" => "Leírás", "tooltip" => "Eszköz leírása"),
            "hardwareIP" => array("text" => "IP", "tooltip" => "Eszköz IP címe"),
            "hardwareSwitch" => array("text" => "Switch", "tooltip" => "Switch IP címe"),
            "hardwareSwitchPort" => array("text" => "Port", "tooltip" => "Switch Portja"),
            "hardwareLaptopOS" => array("text" => "Op. Rendszer", "tooltip" => "Laptop operációs rendszere"),
            "hardwareLaptopType" => array("text" => "Típus", "tooltip" => "Laptop típúsa")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1),
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 3),
            array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 7)
        )
    );
}
