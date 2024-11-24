<?php

declare(strict_types=1);

namespace App\Database;

use App\Database\DatabaseDTO;

interface DatabaseDTOCollection
{
    /**
     * @return DatabaseDTO[]
     */
    public function getList(): array;
    public function getFirst(): DatabaseDTO;
    public function getLast(): DatabaseDTO;
    public function fillFromRows(string $databaseDtoClass, array $rows): static; 
}