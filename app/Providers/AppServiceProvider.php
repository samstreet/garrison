<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\BuildingService;
use App\Services\GameService;
use App\Services\IBuildingService;
use App\Services\IGameService;
use App\Services\IPlayerService;
use App\Services\PlayerService;
use App\Traits\HasNoBoot;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use HasNoBoot;

    public function register(): void
    {
        $this->app->bind(IGameService::class, GameService::class);
        $this->app->bind(IPlayerService::class, PlayerService::class);
        $this->app->bind(IBuildingService::class, BuildingService::class);
    }
}
