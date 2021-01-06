<?php

declare(strict_types=1);

namespace Data;

use Database\db;

class d implements iData
{
    private static $db;

    public function __construct()
    {
        self::$db = new db();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$db->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$db->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$db->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$db->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$db->Check());
    }
}
