<?php

declare(strict_types=1);

namespace App\DatabaseDTO;

use App\Database\BaseDatabaseDTO;
use Exception;
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

final class UserDatabaseDTO extends BaseDatabaseDTO
{
    private static array $options = [
        'id' => null,
        'name' => null,
        'last_name' => null,
        'age' => null,
        'height' => null,
        'gender' => null,
    ];

    public function toArray(): array
    {
        return $this->options;
    }

    #[
        Description("Forms a dto for a row fetched from database"),
        Throws(Exception),
        Return_(UserDatabaseDTO::class),
    ]
    public function fromRow(array $row): static
    {
        if ($this->rowValid($row)) {
            foreach ($row as $key => $value) {
                $this->options[$key] = $value;
            }
        }

        return $this;
    }

    public function getId(): ?int
    {
        return $this->options['id'];
    }

    public function getName(): ?string
    {
        return $this->options['name'];
    }

    public function getLastName(): ?string
    {
        return $this->options['last_name'];
    }

    public function getAge(): ?int
    {
        return $this->options['age'];
    }

    public function getHeight(): ?int
    {
        return $this->options['height'];
    }

    public function getGender(): ?string
    {
        return $this->options['gender'];
    }
}