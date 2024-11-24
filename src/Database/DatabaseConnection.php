<?php

declare(strict_types=1);

namespace App\Database;

use PDO;

abstract class DatabaseConnection
{
    protected static PDO $connection;
    protected static ?DatabaseConnection $instance;

    abstract protected function __construct();
    abstract public static function getInstance(): DatabaseConnection;
    
    public function &getConnection(): PDO
    {
        return static::$connection;
    }
}