<?php

declare(strict_types=1);

namespace Database;

use \PDO;
use PreLoad\
{
    Valid,
    Check,
    Log
};

class Queries extends Database
{
    protected static $tableNames = array();
    private static $tableQueries = array();

    public function __construct()
    {
        parent::__construct();
        self::setTableNames();
        self::sQueries(self::$tableQueries);
    }

    public static function setTableNames(): bool
    {
        self::$tableNames = array(
            0 => 'User',
            1 => 'Group',
            2 => 'Group_Member',
            3 => 'Company',
            4 => 'Company_Site',
//            5 => 'Company_Position',
//            6 => 'Company_Worker',
            7 => 'Company_Site_Department',
            99 => 'Combined'
        );
        return true;
    }


    /**
     * Sets array to have class specific queries
     * @param $array array
     * @param $classid int
     * @return bool
     *
     * @author Liszi Dániel
     * @since 2020.09.28
     */
    public function qGet(int $classId): array
    {
        $array = array();
        $typeArray = ['Delete', 'Insert', 'Select', 'Update'];
        foreach ($typeArray as $t)
        {
            if(isset($GLOBALS['Database'][$classId][$t])) {
                $array[$t] = $GLOBALS['Database'][$classId][$t];
            } else {
                $array[$t] = array();
            }
        }
        return $array;
    }

    /**
     * Generates SQL Query array for Table queries
     * @return true
     *
     * @author Liszi Dániel
     * @since 2020.10.16
     */
    public static function sQueries(array &$array): bool
    {
        $typeArray = ['Create', 'Insert'];
        foreach ($typeArray as $t)
        {
            if(isset($GLOBALS['Database']['Table'][$t]))
            {
                $array[$t] = $GLOBALS['Database']['Table'][$t];
            }
            else
            {
                $array[$t] = array();
            }
        }
        return true;
    }

    /**
     * Fires queries based on type
     * @param $var int
     * @param $type string
     * @return bool
     *
     * @author Liszi Dániel
     * @since 2020.09.28
     */
    public static function qCheck(int $var): bool
    {
        if (isset(self::$tableNames[$var]) && isset(self::getSQL()['db']))
        {
            try
            {
                self::setConnection(self::getSQL()['db']);
                $statement = self::getConnection()->prepare($GLOBALS['Database']['Select']['Table']);
                $statement->bindParam(':sqlDB', self::getSQL()['db']);
                $statement->bindParam(':tableName', self::$tableNames[$var]);
                $statement->execute();
                return ($statement->rowCount() === 0);
            }
            catch (PDOException $e)
            {
                return false;
            }
        }
    }

    public static function qCreate(int $var): bool
    {
        if (isset(self::$tableQueries['Create'][$var]))
        {
            try
            {
                self::setConnection(self::getSQL()['db']);
                $statement = self::getConnection()->prepare(self::$tableQueries['Create'][$var]);
                $statement->execute();
                return (($statement->errorInfo())[0] === '00000');
            }
            catch (PDOException $e)
            {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public static function qInsert(int $var): bool
    {
        if (isset(self::$tableQueries['Insert'][$var]))
        {
            try
            {
                self::setConnection(self::getSQL()['db']);
                $statement = self::getConnection()->prepare(self::$tableQueries['Insert'][$var]);
                $statement->execute();
                return ($statement->rowCount() > 0);
            }
            catch (PDOException $e)
            {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public static function qLock(int $var): bool
    {
        if (isset(self::$tableQueries['Lock'][$var]))
        {
            try
            {
                self::setConnection(self::getSQL()['db']);
                $statement = self::getConnection()->prepare(self::$tableQueries['Lock'][$var]);
                $statement->execute();
                return ($statement->rowCount() > 0);
            }
            catch (PDOException $e)
            {
                return false;
            }
        }
        else {
            return false;
        }
    }

    /**
     * Line saver function for running queries
     * @param $array array
     * @return PDOobject
     *
     * @author Liszi Dániel
     * @since 2020.09.30
     */
    public static function qRun(array $array): object
    {
        try {
            self::setConnection(self::getSQL()['db']);
            $statement = self::getConnection()->prepare($array['query']);
            foreach ($array['vNames'] as $v)
            {
                if (isset($array['vData'][$v]))
                {
                    $statement->bindParam(':'.$v,  $array['vData'][$v]);
                }
            }
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e)
        {
            return new stdClass();
        }
    }
}
