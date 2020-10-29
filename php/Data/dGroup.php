<?php

declare(strict_types=1);

namespace Data;

use Database\dbGroup;

class dGroup implements iData
{
    private static $dbGroup;
    
    public function __construct()
    {
	self::$dbGroup = new dbGroup();
    }
    
    public static function Insert(array $array = array()): bool
    {
	return self::$dbGroup->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
	return self::$dbGroup->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
	return self::$dbGroup->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
	return self::$dbGroup->Delete($array, $type);
    }

    public static function Check( ): bool
    {
	return (self::$dbGroup->Check());
    }
}
