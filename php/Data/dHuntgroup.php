<?php

declare(strict_types=1);

namespace Data;

use Database\dbHuntgroup;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dHuntgroup implements iData
{
    private static $dbHuntgroup;

    public function __construct()
    {
        self::$dbHuntgroup = new dbHuntgroup();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbHuntgroup->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbHuntgroup->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        if(isset($array['userCheckbox']) && ! empty($array['userCheckbox'])) {
            $userIdArray = explode(',', $array['userCheckbox']);
            Log::Export($userIdArray);
        }
        return self::$dbHuntgroup->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        $Huntgroup = self::Select($array, 'byHuntgroupId')[0];
        if(! empty($Huntgroup)) {
            if ($Huntgroup['isDelete']) {
                $dHuntgroup_Member = new dHuntgroup_Member();
                $Members = $dHuntgroup_Member->Select($array, 'byHuntgroupId');
                foreach ($Members as $i) {
                    $dHuntgroup_Member->Update(array('userId' => $i['userId'], 'huntgroupId' => 2));
                }
                return self::$dbHuntgroup->Delete($array, $type);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function Check( ): bool
    {
        return (self::$dbHuntgroup->Check());
    }
}
