<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Data\{
    dHardware,
    dHardware_Laptop,
    dHardware_PC,
    dHardware_Printer,
    dHardware_Networking,
    dCombined
};

class sHardware
{
    protected static $dHardware;
    protected static $dHardware_Laptop;
    protected static $dHardware_PC;
    protected static $dHardware_Printer;
    protected static $dHardware_Networking;
    protected static $dCombined;


/*
 * Sets the class variable : dHardware
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDHardware()
    {
        self::$dHardware= new dHardware();
    }

/*
 * Sets the class variable : dHardware_Laptop
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDHardware_Laptop()
    {
        self::$dHardware_Laptop= new dHardware_Laptop();
    }

/*
 * Sets the class variable : dHardware_PC
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDHardware_PC()
    {
        self::$dHardware_PC= new dHardware_PC();
    }

/*
 * Sets the class variable : dHardware_Printer
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDHardware_Printer()
    {
        self::$dHardware_Printer= new dHardware_Printer();
    }

/*
 * Sets the class variable : dHardware_Networking
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDHardware_Networking()
    {
        self::$dHardware_Networking= new dHardware_Networking();
    }
/*
 * Sets the class variable : dCombined
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDCombined()
    {
        self::$dCombined = new dCombined();
    }

/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.03
 * @update 2020.11.23
 */
    public static function Action(array $array = array()): string
    {
        $wclass;
        $returnContent = '';

        switch($array['y']) {
            case 'Laptop':
                $wclass = new sHardware\Laptop;
                break;
            case 'PC':
                $wclass = new sHardware\PC;
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
 * @since 2020.11.13
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
 * @since 2020.11.13
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
 * @since 2020.11.13
 */
    public static function PC(array $array = array()): string
    {
        self::setDCombined();
        $returnString = '';
        $PC = self::$dCombined->Select(array(), 'Hardware_PC_Table');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($PC, 'Hardware_PC');
        return $returnString;
    }
/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
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
 * @since 2020.11.13
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
}
