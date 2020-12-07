<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_Laptop;

class dHardware_Laptop implements iData
{
    private static $dbHardware_Laptop;

    public function __construct()
    {
        self::$dbHardware_Laptop = new dbHardware_Laptop();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbHardware_Laptop->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_Laptop->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Laptop->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Laptop->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_Laptop->Check());
    }
}
