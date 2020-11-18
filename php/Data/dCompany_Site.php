<?php

declare(strict_types=1);

namespace Data;

use PreLoad\{
    Log,
    Check,
    Valid
};

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
        if (Valid::vArray($array)){
            if (
                isset($array['companySiteName'])
                && Valid::vInput($array['companySiteName'], 2)
                && isset ($array['companySiteDesc'])
                && (
                    Valid::vInput($array['companySiteDesc'], 2)
                    || ! Valid::vString($array['companySiteDesc'])
                )
            ) {
                if (
                    isset ($array['companyId'])
                    && Valid::vInput($array['companyId'], 3)
                    && isset ($array['companySiteTypeId'])
                    && Valid::vInput($array['companySiteTypeId'], 3)
                ) {
                     return self::$dbCompany_Site->Insert($array);
                }
            }
        }
        return false;
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
