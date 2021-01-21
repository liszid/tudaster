<?php

declare(strict_types=1);

namespace Data;

use Database\dbAccess_Member;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dAccess_Member implements iData
{
    private static $dbAccess_Member;

    public function __construct()
    {
        self::$dbAccess_Member = new dbAccess_Member();
    }

    public static function Insert(array $array = array()): bool
    {
        if (
            isset($array['accessId'])
            && isset($array['huntgroupId'])
        ) {
            return self::$dbAccess_Member->Insert($array);
        } else {
            return false;
        }
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbAccess_Member->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbAccess_Member->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbAccess_Member->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbAccess_Member->Check());
    }
}
