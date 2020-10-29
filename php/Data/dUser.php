<?php

declare(strict_types=1);

namespace Data;

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
	return self::$dbUser->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
	return self::$dbUser->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
	return self::$dbUser->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
	return self::$dbUser->Delete($array, $type);
    }

    public static function Check( ): bool
    {
	return (self::$dbUser->Check());
    }
}
