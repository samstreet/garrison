<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\GameState;
use App\Models\Game;
use App\Models\Player;
use Exception;
use Illuminate\Support\Str;
use Throwable;

class GameService implements IGameService
{
    public function create(array $attributes): ?Game
    {
        try {
            $game = new Game;
            $game->fill(array_merge(
                [
                    'uuid' => Str::uuid()->toString()
                ],
                $attributes)
            );
            $game->saveOrFail();

            return $game->refresh();
        } catch (Throwable $exception) {
            dd($exception);
            return null;
        }
    }

    public function initialiseGame(Player $player): ?Game
    {
        try {
            if (! $game = $this->create(['player_id' => $player->id])) throw new Exception();

            return $game;
        } catch (Throwable) {
            return null;
        }
    }
}
