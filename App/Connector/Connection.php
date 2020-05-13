<?php

namespace App\Connector;


use PDO;
use PDOException;

class Connection
{
    /**
     * @var object $connection Holds the MySQLi object
     */
    protected static $connection;

    /**
     * @brief Connect to the database
     */
    private function __construct()
    {
        try {
            $serverName = 'localhost';
            $databaseName = 'intern_test';
            $userName = 'intern_test';
            $password = 'intern_test';

            // Below is a localhost connection
            self::$connection = new PDO("mysql:host=$serverName;dbname=$databaseName", $userName, $password);

            // Set PDO attributes.
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_PERSISTENT, false);

        } catch (PDOException $e) {
            echo "Could not connect to database. Message below \n";
            echo $e->getMessage();
            echo "\n";
            exit;
        }
    }

    /**
     * @return object|PDO
     */
    public static function getConnection()
    {
        // If this instance was not been started, start it.
        if (!self::$connection) {
            new Connection();
        }

        // Return the writeable db connection
        return self::$connection;
    }

}
