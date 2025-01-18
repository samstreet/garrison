<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\DifficultyCoefficient;
use App\Enums\GameState;
use App\Models\Buildings\Armoury;
use App\Models\Buildings\Castle;
use App\Models\Buildings\Farm;
use App\Models\Buildings\Garrison;
use App\Models\Buildings\Stable;
use Database\Factories\GameFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $uuid
 * @property GameState $state
 * @property ?Player $player
 * @property ?Armoury $armoury
 * @property ?Castle $castle
 */
class Game extends Model
{
    /** @use HasFactory<GameFactory> */
    use HasFactory;

    use HasTimestamps;

    protected $fillable = [
        'id',
        'uuid',
        'state',
        'player_id',
        'difficulty',
    ];

    protected $hidden = [
        'id',
    ];

    protected $with = [
        'castle',
        'garrison',
        'stable',
    ];

    protected $casts = [
        'state' => GameState::class,
        'difficulty' => DifficultyCoefficient::class,
    ];

    /**
     * @return BelongsTo<Player, $this>
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    /**
     * @return HasOne<Armoury, $this>
     */
    public function armoury(): HasOne
    {
        return $this->hasOne(Armoury::class);
    }

    /**
     * @return HasOne<Castle, $this>
     */
    public function castle(): HasOne
    {
        return $this->hasOne(Castle::class);
    }

    /**
     * @return HasMany<Farm, $this>
     */
    public function farms(): HasMany
    {
        return $this->hasMany(Farm::class);
    }

    /**
     * @return HasOne<Garrison, $this>
     */
    public function garrison(): HasOne
    {
        return $this->hasOne(Garrison::class);
    }

    /**
     * @return HasOne<Stable, $this>
     */
    public function stable(): HasOne
    {
        return $this->hasOne(Stable::class);
    }
}
