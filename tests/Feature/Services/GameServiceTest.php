<?php

declare(strict_types=1);

use App\Enums\GameState;
use App\Models\Game;
use App\Models\Player;
use App\Services\GameService;
use App\Services\IGameService;

it('can create a game', function (): void {
    /** @var GameService $gameService */
    $gameService = app()->make(IGameService::class);
    $player = Player::factory()->create();

    $game = $gameService->initialiseGame($player);
    expect($game)->toBeInstanceOf(Game::class)
        ->and($game?->state->value)->toBe(GameState::GAME_STATE_INITIALISED->value);
});
