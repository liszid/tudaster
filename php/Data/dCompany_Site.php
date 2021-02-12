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
    private static $dLog;

    public function __construct()
    {
        self::$dbCompany_Site = new dbCompany_Site();
        self::$dLog = new dLog();
    }

    public static function Insert(array $array = array()): bool
    {
        $returnData = self::$dbCompany_Site->Insert($array);

        $dCombined = new dCombined();
        sActivity::Set(($dCombined->Select($array,'User_Full'))[0]);

        self::$dLog->Insert(array('logType' => 0,'logAction' => 0,'logCategory' => self::$dbCompany_Site->Class_Id(),'logText' => '','userId' => $array['userId'], 'logBool' => $returnData));

        return $returnData;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbCompany_Site->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        $returnData = self::$dbCompany_Site->Update($array, $type);

        self::$dLog->Insert(array('logType' => 0,'logAction' => 1,'logCategory' => self::$dbCompany_Site->Class_Id(),'logText' => 'companySiteId => '.$array['companySiteId'].'','userId' => $array['userId'], 'logBool' => $returnData));

        return $returnData;
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        $returnData = self::$dbCompany_Site->Delete($array, $type);

        self::$dLog->Insert(array('logType' => 0,'logAction' => 2,'logCategory' => self::$dbCompany_Site->Class_Id(),'logText' => 'companySiteId => '.$array['companySiteId'].'','userId' => $array['userId'], 'logBool' => $returnData));

        return $returnData;
    }

    public static function Check( ): bool
    {
        return (self::$dbCompany_Site->Check());
    }
}
