<?php

use App\Models\Player;
use App\Services\GameService;
use App\Services\IGameService;

it('can create a game', function () {
    /**
     * @var GameService $gameService
     */
    $gameService = app()->make(IGameService::class);
    $player = Player::factory()->create();

    $game = $gameService->initialiseGame($player);
    dd($game->player);
});
