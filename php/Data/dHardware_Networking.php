<?php

declare(strict_types=1);

namespace Data;

use Database\dbHardware_Networking;

class dHardware_Networking implements iData
{
    private static $dbHardware_Networking;

    public function __construct()
    {
        self::$dbHardware_Networking = new dbHardware_Networking();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbHardware_Networking->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware_Networking->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Networking->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware_Networking->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware_Networking->Check());
    }
}
