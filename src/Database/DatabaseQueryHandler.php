<?php

declare(strict_types=1);

namespace App\Database;

use App\Database\DatabaseDTO;

interface DatabaseQueryHandler
{
    public function fetchOne(): DatabaseDTO;
    public function fetchMany(): DatabaseDTOCollection;
}