<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_PC;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dHardware_PC implements iData
{
    private static $dbHardware_PC;

    public function __construct()
    {
        self::$dbHardware_PC = new dbHardware_PC();
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
            ,array('key' => 'hardwarePCUser', 'type' => 2)
            ,array('key' => 'hardwarePCType', 'type' => 2)
            ,array('key' => 'hardwarePCUse', 'type' => 2)
            ,array('key' => 'hardwarePCOS', 'type' => 2)
            ,array('key' => 'hardwarePCOSVer', 'type' => 2)
            ,array('key' => 'hardwarePCHDD', 'type' => 2)
            ,array('key' => 'hardwarePCMEM', 'type' => 2)
            ,array('key' => 'hardwarePCPROC', 'type' => 2)
            ,array('key' => 'hardwarePCNetworkPorts', 'type' => 2)
            ,array('key' => 'hardwarePCOperator', 'type' => 2)
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
                return self::$dbHardware_PC->Insert($array);
            }
        }
        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_PC->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_PC->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_PC->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_PC->Check());
    }
}
