<?php

declare(strict_types=1);

namespace Data;

use PreLoad\{
    Log,
    Check,
    Valid
};

use Database\dbCompany;

use Samples\sActivity;

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
        ) {
            $returnData = self::$dbCompany->Insert($array);

            $dCombined = new dCombined();
            sActivity::Set(($dCombined->Select($array,'User_Full'))[0]);

            return $returnData;
        }

        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbCompany->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        $checkArray = array(
            array('key' => 'companyDesc', 'type' => 2),
            array('key' => 'companyOwnerLastName', 'type' => 2),
            array('key' => 'companyOwnerFirstName', 'type' => 2),
            array('key' => 'companyAddressCity', 'type' => 2),
            array('key' => 'companyAddressPostcode', 'type' => 3),
            array('key' => 'companyAddressStreet', 'type' => 2),
        );

        return ((true) ? self::$dbCompany->Update($array, $type) : false);
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
