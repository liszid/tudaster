<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_Server;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dHardware_Server extends Data implements iData
{
    private static $dbHardware_Server;
    private static $dHardware;

    const INSERT = array(
        array('key' => 'hardwareName', 'type' => 2)
        ,array('key' => 'hardwareDesc', 'type' => 2)
        ,array('key' => 'hardwareSerial', 'type' => 2)
        ,array('key' => 'hardwareMAC', 'type' => 2)
        ,array('key' => 'hardwareIP', 'type' => 2)
        ,array('key' => 'companySiteId', 'type' => 3)
        ,array('key' => 'hardwareType', 'type' => 2)
    );

    const UPDATE = array(
        array('key' => 'hardwareSwitch', 'type' => 2)
        ,array('key' => 'hardwareSwitchPort', 'type' => 2)
        ,array('key' => 'hardwareVLANName', 'type' => 2)
        ,array('key' => 'hardwareVLANNum', 'type' => 2)
        ,array('key' => 'hardwareDateIn', 'type' => 2)
        ,array('key' => 'hardwareDateOut', 'type' => 2)
    );

    const SERVER = array(
        array('key' => 'hardwareServerUser', 'type' => 2)
        ,array('key' => 'hardwareServerType', 'type' => 2)
        ,array('key' => 'hardwareServerUse', 'type' => 2)
        ,array('key' => 'hardwareServerOS', 'type' => 2)
        ,array('key' => 'hardwareServerOSVer', 'type' => 2)
        ,array('key' => 'hardwareServerHDD', 'type' => 2)
        ,array('key' => 'hardwareServerMEM', 'type' => 2)
        ,array('key' => 'hardwareServerPROC', 'type' => 2)
        ,array('key' => 'hardwareServerNetworkPorts', 'type' => 2)
        ,array('key' => 'hardwareServerOperator', 'type' => 2)
    );

    public function __construct()
    {
        self::$dbHardware_Server = new dbHardware_Server();
        self::$dHardware = new dHardware();
    }

    public static function Insert(array $array = array()): bool
    {
        $dHardware = new dHardware();
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::SERVER)
        ) {
            if ($dHardware->Insert($array)) {
                $array['hardwareId'] = ($dHardware->Select($array,'byUserId_Last'))[0][0];
                return self::$dbHardware_Server->Insert($array);
            }
        }
        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_Server->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::UPDATE)
            && self::CheckBool($array, self::SERVER)
        ) {
            return (self::$dHardware->Update($array, $type) || self::$dbHardware_Server->Update($array, $type));
        } else {
            return false;
         }
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        $hardwareId = (self::Select($array,'byHardwareServerId'))[0];
        return self::$dHardware->Delete($hardwareId, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_Server->Check());
    }
}
