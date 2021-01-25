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

        if (! strcmp($type, 'User_Full')) {
            $tempArray = array('userId');
        } elseif (
            ! strcmp($type, 'Member_Full')
            || ! strcmp($type, 'Access_Table')
            || ! strcmp($type, 'Company_Site_Table')
            || ! strcmp($type, 'Hardware_Laptop_Table')
            || ! strcmp($type, 'Hardware_Computer_Table')
            || ! strcmp($type, 'Hardware_Printer_Table')
            || ! strcmp($type, 'Hardware_Networking_Table')
            || ! strcmp($type, 'Hardware_Server_Table')
            || ! strcmp($type, 'Hardware_Security_Table')
            || ! strcmp($type, 'Company_Site_Select')
        ){
            $tempArray = array();
        } elseif (! strcmp($type, 'Huntgroup_Members')){
            $tempArray = array('huntgroupId');
        } elseif (! strcmp($type, 'Company_Site_View')){
            $tempArray = array('companySiteId');
        } elseif (! strcmp($type, 'Company_Site_Filter')){
            $tempArray = array('companyId');
        } elseif (! strcmp($type, 'Hardware_Laptop_View')){
            $tempArray = array('hardwareLaptopId');
        } elseif (! strcmp($type, 'Hardware_Computer_View')){
            $tempArray = array('hardwareComputerId');
        } elseif (! strcmp($type, 'Hardware_Printer_View')){
            $tempArray = array('hardwarePrinterId');
        } elseif (! strcmp($type, 'Hardware_Networking_View')){
            $tempArray = array('hardwareNetworkingId');
        } elseif (! strcmp($type, 'Hardware_Server_View')){
            $tempArray = array('hardwareServerId');
        } elseif (! strcmp($type, 'Hardware_Security_View')){
            $tempArray = array('hardwareSecurityId');
        } elseif (! strcmp($type, 'Hardware_Members')){
            $tempArray = array('hardwareId');
        } else {
            return array();
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
