<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\GameState;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $uuid
 * @property GameState $state
 * @property ?Player $player
 */
class Game extends Model
{
    use HasTimestamps;

    protected $fillable = [
        'id',
        'uuid',
        'state',
        'player_id',
    ];

    protected $hidden = [
        'id',
    ];

    protected $casts = [
        'state' => GameState::class,
    ];

    /**
     * @return BelongsTo<Player, $this>
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
