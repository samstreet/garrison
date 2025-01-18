<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\GameAware;
use Illuminate\Database\Eloquent\Model;

class GameBuilding extends Model
{
    use GameAware;

    protected $table = 'game_buildings';
}
