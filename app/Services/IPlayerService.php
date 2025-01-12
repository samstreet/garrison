<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Player;

interface IPlayerService extends ICreateable
{
    public function create(array $attributes): ?Player;
}
