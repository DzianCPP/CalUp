<?php

declare(strict_types=1);

namespace App\Enum;

enum UserGenderEnum: string
{
    case MALE = 'male';
    case FEMALE = 'female';
}