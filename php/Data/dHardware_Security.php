<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_Security;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dHardware_Security extends Data implements iData
{
    private static $dbHardware_Security;
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

    const SECURITY = array(
        array('key' => 'hardwareSecurityType', 'type' => 2)
        ,array('key' => 'hardwareSecurityUse', 'type' => 2)
        ,array('key' => 'hardwareSecurityOS', 'type' => 2)
        ,array('key' => 'hardwareSecurityOSVer', 'type' => 2)
        ,array('key' => 'hardwareSecurityNetworkPorts', 'type' => 2)
        ,array('key' => 'hardwareSecurityOperator', 'type' => 2)
    );

    public function __construct()
    {
        self::$dbHardware_Security = new dbHardware_Security();
        self::$dHardware = new dHardware();
    }

    public static function Insert(array $array = array()): bool
    {
        $dHardware = new dHardware();
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::SECURITY)
        ) {
            if ($dHardware->Insert($array)) {
                $array['hardwareId'] = ($dHardware->Select($array,'byUserId_Last'))[0][0];
                return self::$dbHardware_Security->Insert($array);
            }
        }
        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_Security->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::UPDATE)
            && self::CheckBool($array, self::SECURITY)
        ) {
            return (self::$dHardware->Update($array, $type) || self::$dbHardware_Security->Update($array, $type));
        }else {
            return false;
         }
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        $hardwareId = (self::Select($array,'byHardwareSecurityId'))[0];
        return self::$dHardware->Delete($hardwareId, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_Security->Check());
    }
}
