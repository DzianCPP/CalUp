<?php

declare(strict_types=1);

namespace App\Database;

use Exception;
use App\Database\DatabaseDTO;
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

abstract class BaseDatabaseDTO implements DatabaseDTO
{
    private static array $options = [];

    abstract public function toArray(): array;
    
    abstract public function fromRow(array $row): static;

    #[
        Throws(Exception),
        Return_("bool"),
        Description("Validates row structure to dto structure"),
    ]
    public function rowValid(array $row): bool
    {
        foreach (array_keys($row) as $key) {
            if (!array_key_exists($key, static::$options)) {
                throw new Exception(
                    'Row structure and database dto structure are not matching! Dto class name is '
                    . static::class
                    . ' | options structure is '
                    . implode(', ', array_keys(static::$options))
                    . ' | row structure is '
                    . implode(', ', array_keys($row))
                );
            }
        }

        return true;
    }
}