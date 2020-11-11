<?php

declare(strict_types=1);

namespace Data;

use Database\dbCompany_Site;

class dCompany_Site implements iData
{
    private static $dbCompany_Site;

    public function __construct()
    {
        self::$dbCompany_Site = new dbCompany_Site();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbCompany_Site->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbCompany_Site->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbCompany_Site->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbCompany_Site->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbCompany_Site->Check());
    }
}
