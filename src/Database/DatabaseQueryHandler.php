<?php

declare(strict_types=1);

namespace App\Database;

use App\Database\DatabaseDTO;

interface DatabaseQueryHandler
{
    public function execute(string $sql): bool;
    public function fetchOne(): DatabaseDTO;
    public function fetchMany(): DatabaseDTOCollection;
    public function insertOne(DatabaseDTO $databaseDto): bool;
    public function updateOne(DatabaseDto $databaseDto): bool;
    public function upsertOne(DatabaseDto $databaseDto): bool;
    public function deleteOne(DatabaseDto $databaseDto): bool;
}