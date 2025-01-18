<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Game;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait GameAware
{
    /**
     * @return BelongsTo<Game, $this>
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
