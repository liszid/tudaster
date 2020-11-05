<?php

declare(strict_types=1);

namespace Data;

use PreLoad\{
    Log,
    Check,
    Valid
};

use Database\dbUser;

class dUser implements iData
{
    private static $dbUser;

    public function __construct()
    {
        self::$dbUser = new dbUser();
    }

    public static function Insert(array $array = array()): bool
    {
        if (isset($array['nameUser']) && isset($array['contEmail'])) {
            if (Valid::vInput($array['contEmail'], 4) && Valid::vInput($array['nameUser'], 0)) {
                if(empty(self::Select($array, 'byUserName')) && empty(self::Select($array, 'byContEmail'))) {
                    $array['pWord'] = md5($array['nameUser']);
                    $bool_1 = self::$dbUser->Insert($array);
                    if ($bool_1) {
                        $dGroup_Member = new dGroup_Member();
                        $userId = (self::Select($array, 'byUserName'))[0]['userId'];
                        return $dGroup_Member::Insert(array('userId' => (int)$userId, 'groupId' => (int)$GLOBALS['defaultGrp']));
                    } else {
                        return false;
                    }
                }
            }
        }
        Log::Export(false);
        return false;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbUser->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        if (! strcmp($type, 'Delete')) {
            $dGroup_Member = new dGroup_Member();
            return $dGroup_Member->Update($array, 'byUserId');
        } else {
            return self::$dbUser->Update($array, $type);
        }
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        $User = self::Select($array, 'byUserId')[0];
        if(! empty($User)) {
            if ($User['isDelete']) {
                return self::$dbUser->Delete($array, $type);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function Check( ): bool
    {
        return (self::$dbUser->Check());
    }
}
