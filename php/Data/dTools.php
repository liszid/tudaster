<?php

declare(strict_types=1);

namespace Data;

use Database\dbTools;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dTools implements iData
{
    private static $dbTools;

    public function __construct()
    {
        self::$dbTools = new dbTools();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbTools->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbTools->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbTools->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbTools->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbTools->Check());
    }
}
