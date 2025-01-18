<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Player;
use Illuminate\Database\Eloquent\Model;

class PlayerService implements IPlayerService
{
    /**
     * @param  array<array-key, mixed>  $attributes
     */
    public function create(Player|Model $model, array $attributes): ?Player
    {
        return null;
    }
}
