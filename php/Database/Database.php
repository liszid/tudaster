<?php

declare(strict_types=1);

namespace Database;

use \PDO;

class Database
{
    private static $SQL = array();
    private static $conn = null;

    public function __construct()
    {
        self::setSQL();
        self::setConnection();
    }

    private static function setSQL(): bool
    {
        self::$SQL = array(
            'user' => 'root',
            'pass' => 'mysql',
            'port' => '3306',
            'host' => 'mysql-server',
            'db'   => 'ksys_tudaster'
        );
        return true;
    }

    /**
     * Creates a PDO connection using \PDO class and returns a PDO object if true
     * @param $dbName string
     * @return bool
     *
     * @author Liszi Dániel
     * @since 2020.09.28
     */
    public static function setConnection(string $dbName = ''): bool
    {
        try {
            if ( empty($dbName) )
            {
                self::$conn = new PDO("mysql:host=".self::getSQL()['host'].";port=".self::getSQL()['port'], self::getSQL()['user'], self::getSQL()['pass']);
            }
            else {
                self::$conn = new PDO("mysql:host=".self::getSQL()['host'].";port=".self::getSQL()['port'].";dbname=".$dbName, self::getSQL()['user'], self::getSQL()['pass']);
            }
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }

    public static function getSQL(): array
    {
        return self::$SQL;
    }

    public static function getConnection(): object
    {
        return self::$conn;
    }

    private static function sqlQueriesDB(string $query): bool
    {
        self::setConnection();
        $statement = self::getConnection()->prepare($query);
//	$statement->bindParam(':sqlDb', self::getSQL()['db']);
        $statement->execute();
        return (intval($statement->rowCount()) === 1 )? true: false;
    }

    /**
     * Returns true if database exists, false of failure
     * @return bool
     *
     * @author Liszi Dániel
     * @since 2020.09.28
     */
    public static function initDatabase(): bool
    {
        if (self::sqlQueriesDB($GLOBALS['Database']['Select']['Database']) !== true)
        {
            return (self::sqlQueriesDB($GLOBALS['Database']['Create']['Database']) === true) ? true : false;
        }
        return true;
    }
}
