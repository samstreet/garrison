<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\GameState;
use App\Models\Game;
use App\Models\Player;
use Throwable;

class GameService implements IGameService
{
    public function initialiseGame(Player $player): ?Game
    {
        try {
            $game = new Game;
            $game->state = GameState::GAME_STATE_INITIALISED;

            $game->saveOrFail();

            return $game->refresh();
        } catch (Throwable) {
            return null;
        }
    }
}
