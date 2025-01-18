<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\InvalidAttributesException;
use App\Models\Buildings\Armoury;
use App\Models\Buildings\Building;
use App\Models\Buildings\Castle;
use App\Models\Buildings\Farm;
use App\Models\Buildings\Garrison;
use App\Models\Buildings\Stable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\AssignOp\Mod;
use Throwable;

class BuildingService implements IBuildingService
{
    /**
     * @var array<string, array<array-key, mixed>>
     */
    private array $buildingMap = [
        'armoury' => [
            'amount' => 1,
            'health' => 600,
            'class' => Armoury::class,
        ],
        'castle' => [
            'amount' => 1,
            'health' => 1000,
            'class' => Castle::class,
        ],
        'farm' => [
            'amount' => 4,
            'health' => 100,
            'class' => Farm::class,
        ],
        'garrison' => [
            'amount' => 1,
            'health' => 500,
            'class' => Garrison::class,
        ],
        'house' => [
            'amount' => 4,
            'health' => 100,
            'class' => Farm::class,
        ],
        'stable' => [
            'amount' => 1,
            'health' => 300,
            'class' => Stable::class,
        ],
    ];

    /**
     * @return ?Building<Armoury|Castle>
     */
    public function create(Building|Model $model, array $attributes): ?Building
    {

        try {
           $model->fill($attributes)->saveOrFail();

           /** @var Building<Armoury|Castle> $model */
           return $model;
        } catch (Throwable $e) {
            LoggingService::error($e->getMessage());

            return null;
        }
    }

    /**
     * @param  array<array-key, mixed>  $attributes
     * @return ?Building<Armoury|Castle>
     */
    public function initialiseBuilding(Building $building, array $attributes = []): ?Building
    {
        try {
            return $this->create($building, Arr::only($attributes, $building->getFillable()));
        } catch (Throwable $e) {
            LoggingService::error($e->getMessage());

            return null;
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function getBuildingMap(): array
    {
        return $this->buildingMap;
    }
}
