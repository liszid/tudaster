<?php

declare(strict_types=1);

namespace Data;

use Database\dbCompany_Site_Department;

class dCompany_Site_Department implements iData
{
    private static $dbCompany_Site_Department;

    public function __construct()
    {
        self::$dbCompany_Site_Department = new dbCompany_Site_Department();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbCompany_Site_Department->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbCompany_Site_Department->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbCompany_Site_Department->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbCompany_Site_Department->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbCompany_Site_Department->Check());
    }
}
