<?php

declare(strict_types=1);

namespace Samples\sTables;

interface HARDWARE_HARDWARE
{
    const HARDWARE_HARDWARE = array(
        "tableId" => "tableHardwareHardware",
        "tableRoot" => "Hardware/Hardware",
        "tableRole" => "canHardware",
        "data" => array(
            "hardwareId" => array("text" => "Id", "tooltip" => ""),
            "hardwareName" => array("text" => "Név", "tooltip" => "Eszköz neve"),
            "hardwareDesc" => array("text" => "Leírás", "tooltip" => "Eszköz leírása"),
            "hardwareIP" => array("text" => "IP", "tooltip" => "Eszköz IP címe"),
            "hardwareSwitch" => array("text" => "Switch", "tooltip" => "Switch IP címe"),
            "hardwareSwitchPort" => array("text" => "Port", "tooltip" => "Switch Portja"),
            "companySite" => array("text" => "Telephely", "tooltip" => "Kihelyezettség")
        ),
        "button" => array()
    );
}
