<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware;

class dHardware implements iData
{
    private static $dbHardware;

    public function __construct()
    {
        self::$dbHardware = new dbHardware();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbHardware->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware->Check());
    }
}
