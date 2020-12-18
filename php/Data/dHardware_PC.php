<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_PC;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dHardware_PC extends Data implements iData
{
    private static $dbHardware_PC;
    private static $dHardware;

    const INSERT = array(
        array('key' => 'hardwareName', 'type' => 2)
        ,array('key' => 'hardwareDesc', 'type' => 2)
        ,array('key' => 'hardwareSerial', 'type' => 2)
        ,array('key' => 'hardwareMAC', 'type' => 2)
        ,array('key' => 'hardwareIP', 'type' => 2)
        ,array('key' => 'companySiteId', 'type' => 3)
    );

    const UPDATE = array(
        array('key' => 'hardwareSwitch', 'type' => 2)
        ,array('key' => 'hardwareSwitchPort', 'type' => 2)
        ,array('key' => 'hardwareVLANName', 'type' => 2)
        ,array('key' => 'hardwareVLANNum', 'type' => 2)
        ,array('key' => 'hardwareDateIn', 'type' => 2)
        ,array('key' => 'hardwareDateOut', 'type' => 2)
    );

    const PC = array(
        array('key' => 'hardwarePCUser', 'type' => 2)
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

    public function __construct()
    {
        self::$dbHardware_PC = new dbHardware_PC();
        self::$dHardware = new dHardware();
    }

    public static function Insert(array $array = array()): bool
    {
        $dHardware = new dHardware();
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::PC)
        ) {
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
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::UPDATE)
            && self::CheckBool($array, self::PC)
        ) {
            return (self::$dHardware->Update($array, $type) || self::$dbHardware_PC->Update($array, $type));
        } else {
            return false;
         }
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        $hardwareId = (self::Select($array,'byHardwarePCId'))[0];
        return self::$dHardware->Delete($hardwareId, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_PC->Check());
    }
}
