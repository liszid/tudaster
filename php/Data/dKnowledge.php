<?php

declare(strict_types=1);

namespace Data;

use Database\dbKnowledge;

use PreLoad\{
    Log,
    Check,
    Valid
};

class dKnowledge implements iData
{
    private static $dbKnowledge;

    public function __construct()
    {
        self::$dbKnowledge = new dbKnowledge();
    }

    public static function Insert(array $array = array()): bool
    {
        return self::$dbKnowledge->Insert($array);
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbKnowledge->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return self::$dbKnowledge->Update($array, $type);
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return self::$dbKnowledge->Delete($array, $type);
    }

    public static function Check( ): bool
    {
        return (self::$dbKnowledge->Check());
    }
}
