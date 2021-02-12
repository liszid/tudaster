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
    private static $dLog;

    public function __construct()
    {
        self::$dbKnowledge = new dbKnowledge();
        self::$dLog = new dLog();
    }

    public static function Insert(array $array = array()): bool
    {
        $returnData = self::$dbKnowledge->Insert($array);

        self::$dLog->Insert(array('logType' => 0,'logAction' => 0,'logCategory' => self::$dbKnowledge->Class_Id(),'logText' => '','userId' => $array['userId'], 'logBool' => $returnData));

        return $returnData;
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        return self::$dbKnowledge->Select($array, $type);
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        $returnData = self::$dbKnowledge->Update($array, $type);

        self::$dLog->Insert(array('logType' => 0,'logAction' => 1,'logCategory' => self::$dbKnowledge->Class_Id(),'logText' => 'knowledgeId => '.$array['knowledgeId'].'','userId' => $array['userId'], 'logBool' => $returnData));

        return $returnData;
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        $returnData = self::$dbKnowledge->Delete($array, $type);

        self::$dLog->Insert(array('logType' => 0,'logAction' => 2,'logCategory' => self::$dbKnowledge->Class_Id(),'logText' => 'knowledgeId => '.$array['knowledgeId'].'','userId' => $array['userId'], 'logBool' => $returnData));

        return $returnData;
    }

    public static function Check( ): bool
    {
        return (self::$dbKnowledge->Check());
    }
}
