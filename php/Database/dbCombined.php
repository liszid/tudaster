<?php

declare(strict_types=1);

namespace Database;

use PreLoad\{
    Log,
    Valid,
    Check
};

class dbCombined extends Table implements iDatabase
{
    const CLASS_ID = 99;

    private static $classQueries = array();

    public function __construct(){
        parent::__construct();
        self::$classQueries = self::qGet(self::CLASS_ID);
    }

    public static function Insert(array $array = array()): bool
    {
        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        $tempArray = array();

        switch ($type) {
            case 'Member_Full':
            case 'Company_Site_Table':
            case 'Company_Site_Select':
            case 'Access_Table':
            case 'Hardware_Computer_Table':
            case 'Hardware_Printer_Table':
            case 'Hardware_Networking_Table':
            case 'Hardware_Server_Table':
            case 'Hardware_Security_Table':
            break;
            case 'Hardware_Laptop_Table':
            case 'Hardware_Members_By_Type':
            case 'User_Full':
                $tempArray[] = 'userId';
            break;
            case 'Huntgroup_Members':
                $tempArray[] = 'huntgroupId';
            break;
            case 'Company_Site_View':
                $tempArray[] = 'companySiteId';
            break;
            case 'Company_Site_Filter':
                $tempArray[] = 'companyId';
            break;
            case 'Hardware_Laptop_View':
                $tempArray[] = 'hardwareLaptopId';
            break;
            case 'Hardware_Computer_View':
                $tempArray[] = 'hardwareComputerId';
            break;
            case 'Hardware_Printer_View':
                $tempArray[] = 'hardwarePrinterId';
            break;
            case 'Hardware_Networking_View':
                $tempArray[] = 'hardwareNetworkingId';
            break;
            case 'Hardware_Server_View':
                $tempArray[] = 'hardwareServerId';
            break;
            case 'Hardware_Security_View':
                $tempArray[] = 'hardwareSecurityId';
            break;
            case 'Hardware_Members':
                $tempArray[] = 'hardwareId';
            break;
            case 'Access_Members':
                $tempArray[] = 'accessId';
            break;
            default:
                return array();
            break;
        }

        if ( (! empty($array) || empty(array_diff($array, $tempArray)) )&& Valid::vString(self::$classQueries['Select'][$type])) {
    	    if (
                (
                    $tempVar = self::qRun(
                            array(
                                'query' => self::$classQueries['Select'][$type],
                                'vNames' => $tempArray,
                                'vData' => $array
                            )
                        )
                    )->rowCount() > 0
            ) {
                return $tempVar->fetchAll();
    	    }
        }

        return array();
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return false;
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return false;
    }

    public static function Check( ): bool
    {
        return false;
    }

}
