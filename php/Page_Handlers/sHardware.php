<?php

declare(strict_types=1);

namespace Page_Handlers;

use PreLoad\{
    Valid
    ,Check
    ,Log
};

use Data\{
    dHardware
    ,dHardware_Laptop
    ,dHardware_Computer
    ,dHardware_Printer
    ,dHardware_Networking
    ,dCombined
};

use Samples\{
    sCard
    ,sTables
    ,sTranslate
};

class sHardware
{
    protected static $dHardware;
    protected static $dHardware_Laptop;
    protected static $dHardware_Computer;
    protected static $dHardware_Printer;
    protected static $dHardware_Networking;
    protected static $dCombined;

    const HARDWARE = array(
        array('data' => 'hardwareId', 'desc' => '', 'type' => 'hidden', 'tags' => 'Edit')
        ,array('data' => 'hardwareName', 'desc' => 'Megnevezés', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareDesc', 'desc' => 'Leírás', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSerial', 'desc' => 'Serial', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareMAC', 'desc' => 'MAC-cím', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareIP', 'desc' => 'IP-cím', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'companySiteId', 'desc' => 'Telephely', 'type' => 'select', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSwitch', 'desc' => 'Switch IP', 'type' => 'text', 'tags' => 'View,Edit')
        ,array('data' => 'hardwareSwitchPort', 'desc' => 'Switch Port', 'type' => 'text', 'tags' => 'View,Edit')
        ,array('data' => 'hardwareVLANName', 'desc' => 'VLAN Név', 'type' => 'text', 'tags' => 'View,Edit')
        ,array('data' => 'hardwareVLANNum', 'desc' => 'VLAN Száma', 'type' => 'text', 'tags' => 'View,Edit')
        ,array('data' => 'hardwareDateIn', 'desc' => 'Beszerzés dátuma', 'type' => 'text', 'tags' => 'View,Edit')
        ,array('data' => 'hardwareDateOut', 'desc' => 'Kivitel dátuma', 'type' => 'text', 'tags' => 'View,Edit')
    );

    const LAPTOP = array(
        array('data' => 'hardwareLaptopId', 'desc' => '', 'type' => 'hidden', 'tags' => 'Edit')
        ,array('data' => 'hardwareLaptopUser', 'desc' => 'Kezelő', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareLaptopType', 'desc' => 'Márka, típus', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareLaptopOS', 'desc' => 'Op. rendszer', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareLaptopOSVer', 'desc' => 'Op. rendszer verzió', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareLaptopHDD', 'desc' => 'Tárhely', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareLaptopMEM', 'desc' => 'Memória', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareLaptopPROC', 'desc' => 'Processzor', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareLaptopOperator', 'desc' => 'Beállító', 'type' => 'text', 'tags' => 'Add,View,Edit')
    );

    const COMPUTER = array(
        array('data' => 'hardwareComputerId', 'desc' => '', 'type' => 'hidden', 'tags' => 'Edit')
        ,array('data' => 'hardwareComputerUser', 'desc' => 'Kezelő', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareComputerType', 'desc' => 'Márka, típus', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareComputerUse', 'desc' => 'Használati cél', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareComputerOS', 'desc' => 'Op. Rendszer', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareComputerOSVer', 'desc' => 'Op. Rendszer verzió', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareComputerHDD', 'desc' => 'Tárhely', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareComputerMEM', 'desc' => 'Memória', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareComputerPROC', 'desc' => 'Processzor', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareComputerNetworkPorts', 'desc' => 'Portok száma', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareComputerOperator', 'desc' => 'Beállító', 'type' => 'text', 'tags' => 'Add,View,Edit')
    );

    const PRINTER = array(
        array('data' => 'hardwarePrinterId', 'desc' => '', 'type' => 'hidden', 'tags' => 'Edit')
        ,array('data' => 'hardwarePrinterUse', 'desc' => 'Használat', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwarePrinterType', 'desc' => 'Márka,típus', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwarePrinterToner', 'desc' => 'Toner', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwarePrinterOperator', 'desc' => 'Beállító', 'type' => 'text', 'tags' => 'Add,View,Edit')
    );

    const NETWORKING = array(
        array('data' => 'hardwareNetworkingId', 'desc' => '', 'type' => 'hidden', 'tags' => 'Edit')
        ,array('data' => 'hardwareNetworkingType', 'desc' => 'Márka, típus', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareNetworkingUse', 'desc' => 'Használat', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareNetworkingOS', 'desc' => 'Op. rendszer', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareNetworkingOSVer', 'desc' => 'Op. rendszer verzió', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareNetworkingNetworkPorts', 'desc' => 'Hálózati portok', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareNetworkingOperator', 'desc' => 'Beállító', 'type' => 'text', 'tags' => 'Add,View,Edit')
    );

/*
 * Sets the class variable : dHardware
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDHardware()
    {
        self::$dHardware= new dHardware();
    }

/*
 * Sets the class variable : dHardware_Laptop
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDHardware_Laptop()
    {
        self::$dHardware_Laptop= new dHardware_Laptop();
    }

/*
 * Sets the class variable : dHardware_Computer
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDHardware_Computer()
    {
        self::$dHardware_Computer= new dHardware_Computer();
    }

/*
 * Sets the class variable : dHardware_Printer
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDHardware_Printer()
    {
        self::$dHardware_Printer= new dHardware_Printer();
    }

/*
 * Sets the class variable : dHardware_Networking
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDHardware_Networking()
    {
        self::$dHardware_Networking= new dHardware_Networking();
    }
/*
 * Sets the class variable : dCombined
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDCombined()
    {
        self::$dCombined = new dCombined();
    }

/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    public static function Action(array $array = array()): string
    {
        $wclass;
        $returnContent = '';

        switch($array['y']) {
            case 'Laptop':
                $wclass = new sHardware\Laptop;
                break;
            case 'Computer':
                $wclass = new sHardware\Computer;
                break;
            case 'Printer':
                $wclass = new sHardware\Printer;
                break;
            case 'Networking':
                $wclass = new sHardware\Networking;
                break;
            case 'Hardware':
                $wclass = new sHardware\Networking;
                break;
        }

        switch ($array['z']) {
            case 'Add':
                $returnContent .= $wclass::Add($array);
                break;
            case 'View':
                $returnContent .= $wclass::View($array);
                break;
            case 'Delete':
                $returnContent .= $wclass::Delete($array);
                break;
            case 'Edit':
                $returnContent .= $wclass::Edit($array);
                break;
        }
        if (Valid::vString($returnContent)) {
            $returnContent = '<div class="text-center justification-centered">'.$returnContent.'</div>';
        }

        return $returnContent;
    }
/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.09
 */
    public static function Hardware(array $array = array()): string
    {
        self::setDHardware();
        $returnString = '';
        $Hardware = self::$dHardware->Select(array(), 'All');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Hardware, 'Hardware_Hardware');
        return $returnString;
    }
/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.09
 */
    public static function Laptop(array $array = array()): string
    {
        self::setDCombined();
        $returnString = '';
        $Laptop = self::$dCombined->Select(array(), 'Hardware_Laptop_Table');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Laptop, 'Hardware_Laptop');
        return $returnString;
    }
/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.09
 */
    public static function Computer(array $array = array()): string
    {
        self::setDCombined();
        $returnString = '';
        $Computer = self::$dCombined->Select(array(), 'Hardware_Computer_Table');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Computer, 'Hardware_Computer');
        return $returnString;
    }
/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.09
 */
    public static function Printer(array $array = array()): string
    {
        self::setDCombined();
        $returnString = '';
        $Printer = self::$dCombined->Select(array(), 'Hardware_Printer_Table');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Printer, 'Hardware_Printer');
        return $returnString;
    }
/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.13
 */
    public static function Networking(array $array = array()): string
    {
        self::setDCombined();
        $returnString = '';
        $Networking = self::$dCombined->Select(array(), 'Hardware_Networking_Table');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Networking, 'Hardware_Networking');
        return $returnString;
    }

/*
 * @return array
 * @author Liszi Dániel
 * @since 2020.12.16
 */
    protected static function Company_Site_Select(): array
    {
        self::setDCombined();
        $tempArray = array();
        foreach(self::$dCombined->Select(array(), 'Company_Site_Select') as $i) {
            $tempArray[] = array('id' => $i['companySiteId'], 'name' => $i['companyName'].' - '.$i['companySiteName']);
        }
        return $tempArray;
    }
}
