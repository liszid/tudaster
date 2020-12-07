<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_PC;

class dHardware_PC implements iData
{
    private static $dbHardware_PC;

    public function __construct()
    {
        self::$dbHardware_PC = new dbHardware_PC();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbHardware_PC->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_PC->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_PC->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_PC->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_PC->Check());
    }
}
