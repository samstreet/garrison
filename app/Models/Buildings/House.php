<?php

declare(strict_types=1);

namespace App\Models\Buildings;

use Database\Factories\Buildings\HouseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Building<self>
 */
class House extends Building
{
    /** @use HasFactory<HouseFactory> */
    use HasFactory;

    protected $table = 'houses';
}
