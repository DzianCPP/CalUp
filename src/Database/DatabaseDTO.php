<?php

declare(strict_types=1);

namespace App\Database;

interface DatabaseDTO
{
    public function toArray(): array;
    public function fromRow(array $row): static;
    public function rowValid(array $row): bool;
}