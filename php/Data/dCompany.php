<?php

declare(strict_types=1);

namespace Data;

use PreLoad\{
    Log,
    Check,
    Valid
};

use Database\dbCompany;

class dCompany implements iData
{
    private static $dbCompany;

    public function __construct()
    {
        self::$dbCompany = new dbCompany();
    }

    public static function Insert(array $array = array()): bool
    {
        if (
            isset($array['companyName'])
            && (
                Valid::vString($array['companyName'])
                && Valid::vInput($array['companyName'], 2)
            )
            && isset($array['companyDesc'])
            && (
                ! Valid::vString($array['companyDesc'])
                || Valid::vInput($array['companyDesc'], 2)
            )
        ) {
            return self::$dbCompany->Insert($array);
        }

        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbCompany->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbCompany->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbCompany->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbCompany->Check());
    }
}
