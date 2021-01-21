<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_Member;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dHardware_Member implements iData
{
    private static $dbHardware_Member;

    public function __construct()
    {
        self::$dbHardware_Member = new dbHardware_Member();
    }

    public static function Insert(array $array = array()): bool
    {
        if (
            isset($array['hardwareId'])
            && isset($array['huntgroupId'])
        ) {
            return self::$dbHardware_Member->Insert($array);
        } else {
            return false;
        }
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_Member->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Member->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Member->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_Member->Check());
    }
}
