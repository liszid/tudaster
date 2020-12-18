<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_Networking;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dHardware_Networking extends Data implements iData
{
    private static $dbHardware_Networking;
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

    const NETWORKING = array(
        array('key' => 'hardwareNetworkingType', 'type' => 2)
        ,array('key' => 'hardwareNetworkingUse', 'type' => 2)
        ,array('key' => 'hardwareNetworkingOS', 'type' => 2)
        ,array('key' => 'hardwareNetworkingOSVer', 'type' => 2)
        ,array('key' => 'hardwareNetworkingNetworkPorts', 'type' => 2)
        ,array('key' => 'hardwareNetworkingOperator', 'type' => 2)
    );

    public function __construct()
    {
        self::$dbHardware_Networking = new dbHardware_Networking();
        self::$dHardware = new dHardware();
    }

    public static function Insert(array $array = array()): bool
    {
        $dHardware = new dHardware();
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::NETWORKING)
        ) {
            if ($dHardware->Insert($array)) {
                $array['hardwareId'] = ($dHardware->Select($array,'byUserId_Last'))[0][0];
                return self::$dbHardware_Networking->Insert($array);
            }
        }
        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_Networking->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::UPDATE)
            && self::CheckBool($array, self::NETWORKING)
        ) {
            return (self::$dHardware->Update($array, $type) || self::$dbHardware_Networking->Update($array, $type));
        }else {
            return false;
         }
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Networking->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_Networking->Check());
    }
}
