<?php

declare(strict_types=1);

namespace Samples\sTables;

interface HARDWARE
{
    const HARDWARE_DEFAULT = array(
        "hardwareId" => array("text" => "Id", "tooltip" => "")
        ,"hardwareName" => array("text" => "Név", "tooltip" => "Eszköz neve")
        ,"hardwareDesc" => array("text" => "Leírás", "tooltip" => "Eszköz leírása")
        ,"hardwareIP" => array("text" => "IP", "tooltip" => "Eszköz IP címe")
        ,"hardwareSwitch" => array("text" => "Switch", "tooltip" => "Switch IP címe")
        ,"hardwareSwitchPort" => array("text" => "Port", "tooltip" => "Switch Portja")
        ,"companySiteName" => array("text" => "Telephely", "tooltip" => "Kihelyezettség")
        ,"hardwareType" => array("text" => "Kategória", "tooltip" => "Kategória")
    );

    const HARDWARE_NETWORKING = array(
        "hardwareId" => array("text" => "Id", "tooltip" => "")
        ,"hardwareName" => array("text" => "Név", "tooltip" => "Eszköz neve")
        ,"hardwareDesc" => array("text" => "Leírás", "tooltip" => "Eszköz leírása")
        ,"hardwareIP" => array("text" => "IP", "tooltip" => "Eszköz IP címe")
        ,"hardwareSwitch" => array("text" => "Switch", "tooltip" => "Switch IP címe")
        ,"hardwareSwitchPort" => array("text" => "Port", "tooltip" => "Switch Portja")
        ,"hardwareSpecUse" => array("text" => "Használat", "tooltip" => "Eszköz felhasználási módja")
        ,"hardwareSpecType" => array("text" => "Típus", "tooltip" => "Eszköz típúsa")
        ,"companySiteName" => array("text" => "Telephely", "tooltip" => "Kihelyezettség")
    );

    const HARDWARE_PC = array(
        "hardwareId" => array("text" => "Id", "tooltip" => "")
        ,"hardwareName" => array("text" => "Név", "tooltip" => "Eszköz neve")
        ,"hardwareDesc" => array("text" => "Leírás", "tooltip" => "Eszköz leírása")
        ,"hardwareIP" => array("text" => "IP", "tooltip" => "Eszköz IP címe")
        ,"hardwareSwitch" => array("text" => "Switch", "tooltip" => "Switch IP címe")
        ,"hardwareSwitchPort" => array("text" => "Port", "tooltip" => "Switch Portja")
        ,"hardwareSpecType" => array("text" => "Típus", "tooltip" => "Eszköz típúsa")
        ,"hardwareSpecOS" => array("text" => "Op. Rendszer", "tooltip" => "Eszköz operációs rendszere")
        ,"companySiteName" => array("text" => "Telephely", "tooltip" => "Kihelyezettség")
    );

    const HARDWARE_BUTTONS = array(
        array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1)
        ,array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 3)
        ,array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 7)
    );

    const HARDWARE_ACCESS_POINT= array(
        "tableId" => "tableHardwareAccessPoint"
        ,"tableRoot" => "Hardware/Access_Point"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_NETWORKING
        ,"button" => self::HARDWARE_BUTTONS
    );

    const HARDWARE_ALARM = array(
        "tableId" => "tableHardwareAlarm"
        ,"tableRoot" => "Hardware/Alarm"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_NETWORKING
        ,"button" => self::HARDWARE_BUTTONS
    );

    const HARDWARE_CAMERA = array(
        "tableId" => "tableHardwareCamera"
        ,"tableRoot" => "Hardware/Camera"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_NETWORKING
        ,"button" => self::HARDWARE_BUTTONS
    );

    const HARDWARE_COMPUTER = array(
        "tableId" => "tableHardwareComputer"
        ,"tableRoot" => "Hardware/Computer"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_PC
        ,"button" => self::HARDWARE_BUTTONS
    );

    const HARDWARE_DVR_CCTV= array(
        "tableId" => "tableHardwareDVRCCTV"
        ,"tableRoot" => "Hardware/DVR_CCTV"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_NETWORKING
        ,"button" => self::HARDWARE_BUTTONS
    );

    const HARDWARE_HARDWARE = array(
        "tableId" => "tableHardwareHardware"
        ,"tableRoot" => "Hardware/Hardware"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_DEFAULT
        ,"button" => array()
    );

    const HARDWARE_LAPTOP = array(
        "tableId" => "tableHardwareLaptop"
        ,"tableRoot" => "Hardware/Laptop"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_PC
        ,"button" => self::HARDWARE_BUTTONS
    );

    const HARDWARE_PRINTER = array(
        "tableId" => "tableHardwarePrinter"
        ,"tableRoot" => "Hardware/Printer"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_NETWORKING
        ,"button" => self::HARDWARE_BUTTONS
    );

    const HARDWARE_ROUTER = array(
        "tableId" => "tableHardwareRouter"
        ,"tableRoot" => "Hardware/Router"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_NETWORKING
        ,"button" => self::HARDWARE_BUTTONS
    );

    const HARDWARE_SERVER = array(
        "tableId" => "tableHardwareServer"
        ,"tableRoot" => "Hardware/Server"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_PC
        ,"button" => self::HARDWARE_BUTTONS
    );

    const HARDWARE_SWITCH = array(
        "tableId" => "tableHardwareSwitch"
        ,"tableRoot" => "Hardware/Switch"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_NETWORKING
        ,"button" => self::HARDWARE_BUTTONS
    );

    const HARDWARE_TELEPHONY = array(
        "tableId" => "tableHardwareTelephony"
        ,"tableRoot" => "Hardware/Telephony"
        ,"tableRole" => "canHardware"
        ,"data" => self::HARDWARE_NETWORKING
        ,"button" => self::HARDWARE_BUTTONS
    );
}
