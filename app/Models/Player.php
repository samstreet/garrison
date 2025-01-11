<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasDamageModifier;
use App\Traits\HasStressModifier;
use Database\Factories\PlayerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $level
 * @property ?Player $player
 * @property Collection<array-key, Game> $games
 *
 * @method static PlayerFactory factory($count = null, $state = [])
 */
class Player extends Authenticatable
{
    use HasFactory;
    use HasDamageModifier;
    use HasStressModifier;

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'level',
    ];

    protected $hidden = [
        'id',
    ];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
