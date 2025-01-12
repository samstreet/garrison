<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Game;
use App\Models\Player;

interface IGameService extends ICreateable
{
    public function initialiseGame(Player $player): ?Game;
}
