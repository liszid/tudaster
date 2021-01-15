<?php

declare(strict_types=1);

namespace Database;

use PreLoad\{
    Log,
    Valid,
    Check
};

class dbHuntgroup extends Table implements iDatabase
{
    const CLASS_ID = 3;

    private static $classQueries = array();

    public function __construct(){
        parent::__construct();
        self::$classQueries = self::qGet(self::CLASS_ID);
    }

    public static function Insert(array $array = array()): bool
    {
        if (! empty($array) && Valid::vString(self::$classQueries['Insert'])) {
            return (
                self::qRun(
                    array(
                        'query' => self::$classQueries['Insert'],
                        'vNames' => array(
                            'groupName',
                            'groupDesc'
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

        if (strcmp($type, 'All') === 0) {
            $tempArray = array();
        } elseif (strcmp($type, 'byGroupId') === 0) {
            $tempArray = array(
                            'groupId'
                        );
        } elseif (strcmp($type, 'forMemberEdit') === 0) {
            $tempArray = array();
        } else {
            return array();
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
        if (! empty($array) && Valid::vString(self::$classQueries['Update'])) {
            return (
                self::qRun(
                    array(
                        'query' => self::$classQueries['Update'],
                        'vNames' => array(
                            'canAdministrative',
                            'mngGroups',
                            'mngUsers',
                            'mngMembers',
                            'mngHuntgroups',
                            'mngHGMembers',
                            'mngTools',
                            'canUsers',
                            'canCompany',
                            'canKnowledge',
                            'canUsername',
                            'canPassword',
                            'canHardware',
                            'canEdit',
                            'canLogin',
                            'groupId'
                        ),
                        'vData' => $array
                    )
                )->rowCount() > 0
            );
        } else {
            return false;
        }
    }

    public static function Delete(array $array = array(), string $type = ''): bool
    {
        if (! empty($array) && Valid::vString(self::$classQueries['Delete'])) {
            return (
                self::qRun(
                    array(
                        'query' => self::$classQueries['Delete'],
                        'vNames' => array(
                            'groupId'
                        ),
                        'vData' => $array
                    )
                )->rowCount() > 0
            );
        } else {
            return false;
        }
    }

    public static function Check( ): bool
    {
        return (! self::qCheck(self::CLASS_ID));
    }

}
