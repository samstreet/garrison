<?php

declare(strict_types=1);

namespace App\Enums;

enum GameState: string
{
    case GAME_STATE_INITIALISED = 'initialised';
    case GAME_STATE_FINISHED = 'played';
    case GAME_STATE_PAUSED = 'paused';

}
