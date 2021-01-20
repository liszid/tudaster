<?php

declare(strict_types=1);

namespace Data;

use PreLoad\{
    Log,
    Check,
    Valid
};

use Database\dbHardware;

use Samples\sActivity;

class dHardware implements iData
{
    private static $dbHardware;

    public function __construct()
    {
        self::$dbHardware = new dbHardware();
    }

    public static function Insert(array $array = array()): bool
    {
        $returnData = self::$dbHardware->Insert($array);

        $dCombined = new dCombined();
        sActivity::Set(($dCombined->Select($array,'User_Full'))[0]);

        return $returnData;
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
