<?php

declare(strict_types=1);

namespace App\MySQLDatabase;

use App\Database\DatabaseConnection;
use PDO;

class MySQLDatabaseConnection extends DatabaseConnection
{
    protected function __construct()
    {
        $dbHostName = $_ENV['MYSQL_HOST'];
        $dbPassword = $_ENV['MYSQL_PASSWORD'];
        $dbUserName = $_ENV['MYSQL_USER'];
        $dbName = $_ENV['MYSQL_DATABASE'];
        $dsn = "mysql:host=$dbHostName;dbname=$dbName";

        static::$connection = new PDO(
            dsn: $dsn, 
            username: $dbUserName,
            password: $dbPassword
        );
    }
    
    public static function getInstance(): MySQLDatabaseConnection
    {
        if (static::$instance === null) {
            static::$instance = new MySQLDatabaseConnection();
        }

        return self::$instance;
    }
}