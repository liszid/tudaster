<?php

declare(strict_types=1);

namespace Data;

use Database\dbAccess;

class dAccess implements iData
{
    private static $dbAccess;

    public function __construct()
    {
        self::$dbAccess = new dbAccess();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbAccess->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbAccess->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbAccess->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbAccess->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbAccess->Check());
    }
}
