<?php

declare(strict_types=1);

namespace App\Models\Buildings;

use Database\Factories\Buildings\GarrisonFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Building<self>
 */
class Garrison extends Building
{
    /** @use HasFactory<GarrisonFactory> */
    use HasFactory;

    protected $table = 'garrisons';
}
