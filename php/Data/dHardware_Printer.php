<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_Printer;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dHardware_Printer implements iData
{
    private static $dbHardware_Printer;

    public function __construct()
    {
        self::$dbHardware_Printer = new dbHardware_Printer();
    }

    public static function Insert(array $array = array()): bool
    {
        $dHardware = new dHardware();
        $checkBool = true;
        $checkArray = array(
            array('key' => 'hardwareName', 'type' => 2)
            ,array('key' => 'hardwareDesc', 'type' => 2)
            ,array('key' => 'hardwareSerial', 'type' => 2)
            ,array('key' => 'hardwareMAC', 'type' => 2)
            ,array('key' => 'hardwareIP', 'type' => 2)
            ,array('key' => 'companySiteId', 'type' => 3)
            ,array('key' => 'hardwarePrinterUse', 'type' => 2)
            ,array('key' => 'hardwarePrinterType', 'type' => 2)
            ,array('key' => 'hardwarePrinterToner', 'type' => 2)
            ,array('key' => 'hardwarePrinterOperator', 'type' => 2)
        );
        foreach ($checkArray as $i) {
            if (
                ! isset($array[$i['key']])
                || (
                    ! Valid::vInput($array[$i['key']], $i['type'])
                    && Valid::vString($array[$i['key']])
                )
            ) {
                $checkBool = false;
            } elseif (
                isset($array[$i['key']])
                && ! Valid::vString($array[$i['key']])
            ) {
                switch ($i['type']) {
                    case 2:
                        $array[$i['key']] = '-';
                        break;
                    case 3:
                        $array[$i['key']] = '1';
                        break;
                }
            }
        }

        if ($checkBool) {
            if ($dHardware->Insert($array)) {
                $array['hardwareId'] = ($dHardware->Select($array,'byUserId_Last'))[0][0];
                return self::$dbHardware_Printer->Insert($array);
            }
        }
        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_Printer->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Printer->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Printer->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_Printer->Check());
    }
}
