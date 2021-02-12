<?php

declare(strict_types=1);

namespace Database;

use PreLoad\{
    Log,
    Valid,
    Check
};

class dbLog extends Table implements iDatabase
{
    const CLASS_ID = 90;

    const TYPE = array(
        'NOTICE'
        ,'WARNING'
        ,'ERROR'
        ,'DEBUG'
    );

    const ACTION = array(
        'INSERT'
        ,'UPDATE'
        ,'DELETE'
    );

    const BOOLE = array(
        'FALSE'
        ,'TRUE'
    );

    private static $classQueries = array();

    public function __construct(){
        parent::__construct();
        self::$classQueries = self::qGet(self::CLASS_ID);
    }

    public static function Insert(array $array = array()): bool
    {
        if (! empty($array) && Valid::vString(self::$classQueries['Insert'])) {

            $array['logType'] = self::TYPE[(int)$array['logType']];
            $array['logAction'] = self::ACTION[(int)$array['logAction']];
            $array['logCategory'] = self::TABLENAMES[(int)$array['logCategory']];
            $array['logBool'] = self::BOOLE[(int)$array['logBool']];

            return (
                self::qRun(
                    array(
                        'query' => self::$classQueries['Insert'],
                        'vNames' => array(
                            'logType'
                            ,'logAction'
                            ,'logCategory'
                            ,'logText'
                            ,'userId'
                            ,'logBool'
                        ),
                        'vData' => $array
                    )
                )->rowCount() > 0
            );
        } else {
            return false;
        }
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        $tempArray = array();

        switch ($type) {
            case 'All':
                break;
            default:
                return array();
                break;
        }

        if ( (! empty($array) || empty(array_diff($array, $tempArray))) && Valid::vString(self::$classQueries['Select'][$type])) {
            if (
                (
                    $tempVar = self::qRun(
                        array(
                            'query' => self::$classQueries['Select'][$type],
                            'vNames' => $tempArray,
                            'vData' => $array
                        )
                    )
                )->rowCount() > 0
            ) {
                return $tempVar->fetchAll();
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    public static function Update(array $array = array(), string $type = ''): bool
    {
        return false;
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        return false;
    }

    public static function Class_Id(): int
    {
        return self::CLASS_ID;
    }

    public static function Check( ): bool
    {
        return (! self::qCheck(self::CLASS_ID));
    }

}
