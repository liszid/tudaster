<?php

declare(strict_types=1);

namespace Data;

use PreLoad\{
    Log,
    Check,
    Valid
};

use Database\dbHardware;

use Samples\sActivity;

class dHardware implements iData
{
    private static $dbHardware;
    private static $dHardware_Member;

    public function __construct()
    {
        self::$dbHardware = new dbHardware();
        self::$dHardware_Member = new dHardware_Member();
    }

    public static function Insert(array $array = array()): bool
    {
        $returnData = self::$dbHardware->Insert($array);

        $dCombined = new dCombined();
        sActivity::Set(($dCombined->Select($array,'User_Full'))[0]);

        return $returnData;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHardware->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        $bool = true;

        if(isset($array['huntgroupCheckbox']) && ! empty($array['huntgroupCheckbox'])) {
            $groupIdArray = explode(',', $array['huntgroupCheckbox']);
            $memberIdArray = self::$dHardware_Member->Select($array, 'byHardwareId');

            if (empty($memberIdArray)) {
                foreach ($groupIdArray as $GId) {
                    if (! empty($GId)) {
                        self::$dHardware_Member->Insert( array( "hardwareId" => $array['hardwareId'], "huntgroupId" => $GId));
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
                        if (! self::$dHardware_Member->Delete(array('hardwareId' => $array['hardwareId'], 'huntgroupId' => $i))) {
                            return false;
                        }
                    }
                } else {
                    $bool = false;
                }
                if ($newDiff) {
                    $bool = true;

                    foreach ($newDiff as $i) {
                        if (! self::$dHardware_Member->Insert(array('hardwareId' => $array['hardwareId'], 'huntgroupId' => $i))) {
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

        return ($bool || self::$dbHardware->Update($array, $type));
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbHardware->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbHardware->Check());
    }
}
