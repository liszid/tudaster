<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_Computer;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dHardware_Computer extends Data implements iData
{
    private static $dbHardware_Computer;
    private static $dHardware;

    const INSERT = array(
        array('key' => 'hardwareName', 'type' => 2)
        ,array('key' => 'hardwareDesc', 'type' => 2)
        ,array('key' => 'hardwareSerial', 'type' => 2)
        ,array('key' => 'hardwareMAC', 'type' => 2)
        ,array('key' => 'hardwareIP', 'type' => 2)
        ,array('key' => 'userId', 'type' => 3)
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

    const COMPUTER = array(
        array('key' => 'hardwareComputerUser', 'type' => 2)
        ,array('key' => 'hardwareComputerType', 'type' => 2)
        ,array('key' => 'hardwareComputerUse', 'type' => 2)
        ,array('key' => 'hardwareComputerOS', 'type' => 2)
        ,array('key' => 'hardwareComputerOSVer', 'type' => 2)
        ,array('key' => 'hardwareComputerHDD', 'type' => 2)
        ,array('key' => 'hardwareComputerMEM', 'type' => 2)
        ,array('key' => 'hardwareComputerPROC', 'type' => 2)
        ,array('key' => 'hardwareComputerNetworkPorts', 'type' => 2)
        ,array('key' => 'hardwareComputerOperator', 'type' => 2)
    );

    public function __construct()
    {
        self::$dbHardware_Computer = new dbHardware_Computer();
        self::$dHardware = new dHardware();
    }

    public static function Insert(array $array = array()): bool
    {
        $dHardware = new dHardware();
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::COMPUTER)
        ) {
            if ($dHardware->Insert($array)) {
                $array['hardwareId'] = ($dHardware->Select($array,'byUserId_Last'))[0][0];
                return self::$dbHardware_Computer->Insert($array);
            }
        }
        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_Computer->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::UPDATE)
            && self::CheckBool($array, self::COMPUTER)
        ) {
            return (self::$dHardware->Update($array, $type) || self::$dbHardware_Computer->Update($array, $type));
        } else {
            return false;
         }
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        $hardwareId = (self::Select($array,'byHardwareComputerId'))[0];
        return self::$dHardware->Delete($hardwareId, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_Computer->Check());
    }
}
