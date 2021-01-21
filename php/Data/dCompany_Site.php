<?php

declare(strict_types=1);

namespace Data;

use PreLoad\{
    Log,
    Check,
    Valid
};

use Database\dbCompany_Site;

use Samples\sActivity;

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
                    $returnData = self::$dbCompany_Site->Insert($array);

                    $dCombined = new dCombined();
                    sActivity::Set(($dCombined->Select($array,'User_Full'))[0]);

                    return $returnData;
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
        $checkArray = array(
            array('key' => 'companySiteDesc', 'type' => 2),
            array('key' => 'companySiteAddressCity', 'type' => 2),
            array('key' => 'companySiteAddressPostcode', 'type' => 3),
            array('key' => 'companySiteAddressStreet', 'type' => 2),
            array('key' => 'companySiteEmail', 'type' => 4),
            array('key' => 'companySitePhone', 'type' => 3),
            array('key' => 'companySiteOwnerLastName', 'type' => 2),
            array('key' => 'companySiteOwnerFirstName', 'type' => 2),
            array('key' => 'companySiteOwnerEmail', 'type' => 4),
            array('key' => 'companySiteOwnerPhone', 'type' => 3),
            array('key' => 'companySiteSubOwnerLastName', 'type' => 2),
            array('key' => 'companySiteSubOwnerFirstName', 'type' => 2),
            array('key' => 'companySiteSubOwnerEmail', 'type' => 4),
            array('key' => 'companySiteSubOwnerPhone', 'type' => 3)
        );

        return ((true) ? self::$dbCompany_Site->Update($array, $type) : false);
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
