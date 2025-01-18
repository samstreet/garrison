<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Buildings\Building;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Throwable;

readonly class GameService implements IGameService
{
    public function __construct(private IBuildingService $buildingService) {}

    public function create(Game|Model $model, array $attributes): ?Game
    {
        try {
            $game = new Game;
            $game->fill(array_merge(
                [
                    'uuid' => Str::uuid()->toString(),
                ],
                $attributes)
            );
            $game->saveOrFail();

            return $game->refresh();
        } catch (Throwable $exception) {
            logger()->error($exception->getMessage());

            return null;
        }
    }

    public function initialiseGame(Player $player): ?Game
    {
        try {
            if (! $game = $this->create($player, ['player_id' => $player->id])) {
//                throw new Exception;
            }

//            $game->saveOrFail();

            $buildings = [];
            $buildingMap = $this->buildingService->getBuildingMap();

            /** @phpstan-ignore-next-line  */
            array_walk($buildingMap, function (array $item, string $key) use (&$buildings) {
                /** @phpstan-ignore-next-line  */
                $buildings[] = array_fill(0, (int) $item['amount'], $item);
            });

            $buildings = array_merge_recursive(...$buildings);

            collect($buildings)
                /** @phpstan-ignore-next-line  */
                ->map(function(array $attributes) use ($game) {
                    /** @var Building<mixed> $class */
                    $class = new $attributes['class'];

                    $building = $this->buildingService->initialiseBuilding($class, $attributes);
                    $building?->game()?->associate($game);
                });

            return $game;
        } catch (Throwable) {
            return null;
        }
    }
}
