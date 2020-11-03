<?php

declare(strict_types=1);

namespace Database;

use PreLoad\{
    Log,
    Valid,
    Check
};

class dbUser extends Table implements iDatabase
{
    const CLASS_ID = 0;

    private static $classQueries = array();

    public function __construct()
    {
        parent::__construct();
        self::$classQueries = self::qGet(self::CLASS_ID);
    }

    public static function Insert(array $array = array()): bool
    {
        if (! empty($array) && Valid::vString(self::$classQueries['Insert'])) {
            return (self::qRun( array('query' => self::$classQueries['Insert'], 'vNames' => array('nameUser', 'pWord', 'contEmail'),'vData' => $array))->rowCount() > 0);
        } else {
            return false;
        }
    }

    public static function Select(array $array = array(), string $type = ''): array
    {
        $tempArray = array();

        if (strcmp($type, 'byUserName') === 0) {
            $tempArray = array('nameUser');
        } elseif (strcmp($type, 'byUserId') === 0) {
            $tempArray = array('userId');
        } elseif (strcmp($type, 'Login') === 0) {
            $tempArray = array('nameUser', 'pWord');
        } elseif (strcmp($type, 'All') === 0) {
            $tempArray = array();
        } else {
            return array();
        }

        if ( (! empty($array) || empty(array_diff($array, $tempArray)) ) && Valid::vString(self::$classQueries['Select'][$type])) {
            if (($tempVar = self::qRun(array('query' => self::$classQueries['Select'][$type], 'vNames' => $tempArray,'vData' => $array)))->rowCount() > 0) {
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
        if (! empty($array) && Valid::vString(self::$classQueries['Update'])) {
            return (self::qRun(array('query' => self::$classQueries['Update'], 'vNames' => array('nameFirst', 'nameLast', 'thumbnail', 'contSite', 'contPhone', 'userId'), 'vData' => $array) )->rowCount() > 0);
        } else {
            return false;
        }
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        if (! empty($array) && Valid::vString(self::$classQueries['Delete'])) {
            return (self::qRun(array('query' => self::$classQueries['Delete'], 'vNames' => array('userId'), 'vData' => $array) )->rowCount() > 0);
        } else {
            return false;
        }
    }

    public static function Check( ): bool
    {
        return (! self::qCheck(self::CLASS_ID));
    }
}
