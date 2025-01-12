<?php

declare(strict_types=1);

use App\Models\Player;

it('can calculate the win loss ratio correctly', function (int $wins, int $losses, $expected) {
    /** @var Player $player */
    $player = Player::factory()->make([
        'wins' => $wins,
        'losses' => $losses,
    ]);

    expect($player->win_loss_ratio)->toBe($expected);
})->with([
    fn () => [1, 10, 0.1],
    fn () => [33, 10, 3.3],
    fn () => [33, 0, 33],
]);
