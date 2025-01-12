<?php

declare(strict_types=1);

namespace App\Enums;

enum DifficultyCoefficient: int
{
    case NOVICE = 1;
    case BEGINNER = 2;
    case INTERMEDIATE = 3;
    case EXPERT = 5;
    case LEGENDARY = 8;
}
