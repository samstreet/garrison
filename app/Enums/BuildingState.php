<?php

declare(strict_types=1);

namespace App\Enums;

enum BuildingState: string
{
    case BUILDING_STATE_HEALTHY = 'healthy';
    case BUILDING_STATE_UNHEALTHY = 'unhealthy';
    case BUILDING_STATE_DESTROYED = 'destroyed';

}
