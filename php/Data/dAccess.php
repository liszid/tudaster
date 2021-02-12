<?php

declare(strict_types=1);

namespace Data;

use Database\dbAccess;

use PreLoad\{
    Log,
    Check,
    Valid
};

use Samples\sActivity;

class dAccess implements iData
{
    private static $dbAccess;
    private static $dLog;

    private static function Encode(string $string = ""): string
    {
        $input = str_split($string);
        $tempArr = array();
        foreach($input as $i){
            $temp = dechex(ord($i));
            $tempArr['Start'] .= $temp[0];
            $tempArr['End'] .= $temp[1];
        }
        return $tempArr['Start'].$tempArr['End'];
    }

    public static function Decode(string $string = ""): string
    {
        $input = str_split($string);
        $tempArr = '';
        $half = count($input) / 2;

        for($i = 0; $i < $half; $i++) {
            $tempArr .= chr(hexdec($input[$i].$input[$i + $half]));
        }

        return $tempArr;
    }

    public function __construct()
    {
        self::$dbAccess = new dbAccess();
        self::$dLog = new dLog();
    }

    public static function Insert(array $array = array()): bool
    {
        $array['accessPassword'] = self::Encode($array['accessPassword']);

        $returnData = self::$dbAccess->Insert($array);

        $dCombined = new dCombined();
        sActivity::Set(($dCombined->Select($array,'User_Full'))[0]);

        self::$dLog->Insert(array('logType' => 0,'logAction' => 0,'logCategory' => self::$dbAccess->Class_Id(),'logText' => '','userId' => $array['userId'], 'logBool' => $returnData));

        return $returnData;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbAccess->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        $array['accessPassword'] = self::Encode($array['accessPassword']);
        $returnData = self::$dbAccess->Update($array, $type);

        self::$dLog->Insert(array('logType' => 0,'logAction' => 1,'logCategory' => self::$dbAccess->Class_Id(),'logText' => 'accessId => '.$array['accessId'].'','userId' => $array['userId'], 'logBool' => $returnData));

        return $returnData;
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        $returnData = self::$dbAccess->Delete($array, $type);

        self::$dLog->Insert(array('logType' => 0,'logAction' => 2,'logCategory' => self::$dbAccess->Class_Id(),'logText' => 'accessId => '.$array['accessId'].'','userId' => $array['userId'], 'logBool' => $returnData));

        return $returnData;
    }

    public static function Check( ): bool
    {
        return (self::$dbAccess->Check());
    }
}
