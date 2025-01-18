<?php

declare(strict_types=1);

namespace App\Models\Buildings;

use App\Enums\BuildingState;
use App\Models\Traits\GameAware;
use Illuminate\Database\Eloquent\Model;

/**
 * @template Building
 *
 * @property string $state
 *
 * @method static mixed factory($count = null, $state = [])
 */
abstract class Building extends Model
{
    use GameAware;

    protected int $health = 100;

    protected $casts = [
        'state' => BuildingState::class,
    ];
}
