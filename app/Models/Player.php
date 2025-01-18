<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasDamageModifier;
use App\Models\Traits\HasStressModifier;
use Database\Factories\PlayerFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $level
 * @property int $wins
 * @property int $losses
 * @property float $win_loss_ratio
 * @property ?Player $player
 * @property Collection<array-key, Game> $games
 *
 * @method static PlayerFactory factory($count = null, $state = [])
 */
class Player extends Authenticatable
{
    use HasDamageModifier;

    /** @use HasFactory<PlayerFactory> */
    use HasFactory;

    use HasStressModifier;

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'level',
        'wins',
        'losses',
    ];

    protected $hidden = [
        'id',
    ];

    /**
     * @return HasMany<Game, $this>
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    /**
     * @return Attribute<mixed, mixed>
     */
    public function winLossRatio(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->losses == 0) {
                    return $this->wins > 0 ? $this->wins : 0;
                }

                $ratio = $this->wins / $this->losses;

                return round($ratio, 2);
            }
        );
    }

    /**
     * @return Attribute<mixed, mixed>
     */
    public function difficultyCoefficient(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->losses == 0) {
                    return $this->wins > 0 ? $this->wins : 0;
                }

                $ratio = $this->wins / $this->losses;

                return round($ratio, 2);
            }
        );
    }
}
