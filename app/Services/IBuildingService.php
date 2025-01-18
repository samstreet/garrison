<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Buildings\Building;

interface IBuildingService extends ICreateable
{
    /**
     * @param Building<mixed> $building
     * @param  array<array-key, mixed>  $attributes
     * @return ?Building<mixed>
     */
    public function initialiseBuilding(Building $building, array $attributes = []): ?Building;

    /**
     * @return array<string, string|int>
     */
    public function getBuildingMap(): array;
}
