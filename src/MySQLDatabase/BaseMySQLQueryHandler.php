<?php

declare(strict_types=1);

namespace App\MySQLDatabase;

use App\Database\DatabaseQueryHandler;
use App\MySQLDatabase\MySQLDatabaseConnection;
use Exception;

abstract class BaseMySQLQueryHandler implements DatabaseQueryHandler
{
    protected MySQLDatabaseConnection $mysqlDatabaseConnection;

    public function __construct()
    {
        $this->mysqlDatabaseConnection = MySQLDatabaseConnection::getInstance();
    }

    public function execute(string $sql): bool
    {
        $conn = $this
            ->mysqlDatabaseConnection
            ->getConnection()
        ;
        
        $rowsAffected = $conn->exec($sql);

        if ($rowsAffected === false) {
            throw new Exception('SQL query could not be executed');
        }

        if ($rowsAffected > 0) {
            return true;
        }

        return false;
    }

    abstract public function fetchOne(): DatabaseDTO;
    abstract public function fetchMany(): DatabaseDTOCollection;
    abstract public function insertOne(DatabaseDTO $databaseDto): bool;
    abstract public function updateOne(DatabaseDto $databaseDto): bool;
    abstract public function upsertOne(DatabaseDto $databaseDto): bool;
    abstract public function deleteOne(DatabaseDto $databaseDto): bool;
}