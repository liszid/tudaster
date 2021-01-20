<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_Laptop;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dHardware_Laptop extends Data implements iData
{
    private static $dbHardware_Laptop;
    private static $dHardware;

    const INSERT = array(
        array('key' => 'hardwareName', 'type' => 2)
        ,array('key' => 'userId', 'type' => 3)
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

    const LAPTOP = array(
        array('key' => 'hardwareLaptopUser', 'type' => 2)
        ,array('key' => 'hardwareLaptopType', 'type' => 2)
        ,array('key' => 'hardwareLaptopOS', 'type' => 2)
        ,array('key' => 'hardwareLaptopOSVer', 'type' => 2)
        ,array('key' => 'hardwareLaptopHDD', 'type' => 2)
        ,array('key' => 'hardwareLaptopMEM', 'type' => 2)
        ,array('key' => 'hardwareLaptopPROC', 'type' => 2)
        ,array('key' => 'hardwareLaptopOperator', 'type' => 2)
    );

    public function __construct()
    {
        self::$dbHardware_Laptop = new dbHardware_Laptop();
        self::$dHardware = new dHardware();
    }

    public static function Insert(array $array = array()): bool
    {
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::LAPTOP)
        ) {
            if (self::$dHardware->Insert($array)) {
                $array['hardwareId'] = (self::$dHardware->Select($array,'byUserId_Last'))[0][0];
                return self::$dbHardware_Laptop->Insert($array);
            }
        }
        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_Laptop->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        if (
            self::CheckBool($array, self::INSERT)
            && self::CheckBool($array, self::UPDATE)
            && self::CheckBool($array, self::LAPTOP)
        ) {
            return (self::$dHardware->Update($array, $type) || self::$dbHardware_Laptop->Update($array, $type));
        }else {
            return false;
         }
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        $hardwareId = (self::Select($array,'byHardwareLaptopId'))[0];
        return self::$dHardware->Delete($hardwareId, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_Laptop->Check());
    }
}
