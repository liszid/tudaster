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
        $checkBool = true;
        $checkArray = array(
            array('key' => 'companyDesc', 'type' => 2),
            array('key' => 'companyOwnerLastName', 'type' => 2),
            array('key' => 'companyOwnerFirstName', 'type' => 2),
            array('key' => 'companyAddressCity', 'type' => 2),
            array('key' => 'companyAddressPostcode', 'type' => 3),
            array('key' => 'companyAddressStreet', 'type' => 2),
        );
        foreach ($checkArray as $i) {
            if (
                ! isset($array[$i['key']])
                || (
                    ! Valid::vInput($array[$i['key']], $i['type'])
                    && Valid::vString($array[$i['key']])
                )
            ) {
                $checkBool = false;
            } elseif (
                isset($array[$i['key']])
                && ! Valid::vString($array[$i['key']])
            ) {
                switch ($i['type']) {
                    case 2:
                    case 4:
                        $array[$i['key']] = '-';
                        break;
                    case 3:
                        $array[$i['key']] = 0;
                        break;
                }
            }
        }

        return (($checkBool) ? self::$dbCompany->Update($array, $type) : false);
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
