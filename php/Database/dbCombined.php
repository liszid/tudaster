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
            || ! strcmp($type, 'Company_Site_Table')
            || ! strcmp($type, 'Hardware_Laptop_Table')
            || ! strcmp($type, 'Hardware_PC_Table')
            || ! strcmp($type, 'Hardware_Printer_Table')
            || ! strcmp($type, 'Hardware_Networking_Table')
            || ! strcmp($type, 'Company_Site_Select')
        ){
            $tempArray = array();
        } elseif (! strcmp($type, 'Company_Site_View')){
            $tempArray = array('companySiteId');
        } elseif (! strcmp($type, 'Company_Site_Filter')){
            $tempArray = array('companyId');
        } elseif (! strcmp($type, 'Hardware_Laptop_View')){
            $tempArray = array('hardwareLaptopId');
        } elseif (! strcmp($type, 'Hardware_PC_View')){
            $tempArray = array('hardwarePCId');
        } elseif (! strcmp($type, 'Hardware_Printer_View')){
            $tempArray = array('hardwarePrinterId');
        } elseif (! strcmp($type, 'Hardware_Networking_View')){
            $tempArray = array('hardwareNetworkingId');
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
