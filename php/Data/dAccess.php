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
    private static $dAccess_Member;

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
        self::$dAccess_Member = new dAccess_Member();
    }

    public static function Insert(array $array = array()): bool
    {
        $array['accessPassword'] = self::Encode($array['accessPassword']);

        $returnData = self::$dbAccess->Insert($array);

        $dCombined = new dCombined();
        sActivity::Set(($dCombined->Select($array,'User_Full'))[0]);

        return $returnData;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbAccess->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        $array['accessPassword'] = self::Encode($array['accessPassword']);

        $bool = true;

        if(isset($array['huntgroupCheckbox']) && ! empty($array['huntgroupCheckbox'])) {
            $groupIdArray = explode(',', $array['huntgroupCheckbox']);
            $memberIdArray = self::$dAccess_Member->Select($array, 'byAccessId');

            if (empty($memberIdArray) && ! empty($userIdArray)) {
                foreach ($groupIdArray as $GId) {
                    if (! empty($UId)) {
                        self::$dAccess_Member->Insert( array( "accessId" => $array['accessId'], "huntgroupId" => $GId));
                    }
                }
            } elseif ($memberIdArray) {
                $newArray = array();
                $oldArray = array();

                foreach ($groupIdArray as $i) {
                    if (! empty($i)) {
                        $newArray[] = $i;
                    }
                }

                foreach ($memberIdArray as $i) {
                    $oldArray[] = $i['huntgroupId'];
                }

                $oldDiff = (($var =array_diff($oldArray, $newArray)) !== array())? $var : false;
                $newDiff = (($var =array_diff($newArray, $oldArray)) !== array())? $var : false;


                if ($oldDiff) {
                    foreach ($oldDiff as $i) {
                        if (! self::$dAccess_Member->Delete(array('accessId' => $array['accessId'], 'huntgroupId' => $i))) {
                            return false;
                        }
                    }
                } else {
                    $bool = false;
                }
                if ($newDiff) {
                    $bool = true;

                    foreach ($newDiff as $i) {
                        if (! self::$dAccess_Member->Insert(array('accessId' => $array['accessId'], 'huntgroupId' => $i))) {
                            return false;
                        }
                    }
                } else {
                    $bool = false;
                }
            } else {
                $bool = false;
            }
        }

        return ($bool || self::$dbAccess->Update($array, $type));
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbAccess->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbAccess->Check());
    }
}
