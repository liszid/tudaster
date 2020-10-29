<?php

declare(strict_types=1);

namespace Data;

use Database\dbGroup_Member;

class dGroup_Member implements iData
{
    private static $dbGroup_Member;
    
    public function __construct()
    {
	self::$dbGroup_Member = new dbGroup_Member();
    }
    
    public static function Insert(array $array = array()): bool
    {
	return self::$dbGroup_Member->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
	return self::$dbGroup_Member->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
	return self::$dbGroup_Member->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
	return self::$dbGroup_Member->Delete($array, $type);
    }

    public static function Check( ): bool
    {
	return (self::$dbGroup_Member->Check());
    }
}
