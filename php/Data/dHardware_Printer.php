<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_Printer;

class dHardware_Printer implements iData
{
    private static $dbHardware_Printer;

    public function __construct()
    {
        self::$dbHardware_Printer = new dbHardware_Printer();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbHardware_Printer->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_Printer->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Printer->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Printer->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_Printer->Check());
    }
}
