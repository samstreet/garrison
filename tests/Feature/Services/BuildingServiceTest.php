<?php

declare(strict_types=1);

use App\Models\Buildings\Armoury;
use App\Models\Buildings\Building;
use App\Services\BuildingService;
use App\Services\IBuildingService;

it('can initialise buildings correctly', function (string $type, array $attributes, string $expected): void {
    /** @var BuildingService $service */
    $service = app()->make(IBuildingService::class);

    /** @var Building<mixed> $building */
    $building = $service->initialiseBuilding($type, $attributes);
    expect($building::class)->toBe($expected);
})->with([
    [
        'armoury',
        [

        ],
        Armoury::class,
    ],
]);
