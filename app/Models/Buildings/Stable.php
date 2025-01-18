<?php

declare(strict_types=1);

namespace App\Models\Buildings;

use Database\Factories\Buildings\StableFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Building<self>
 */
class Stable extends Building
{
    /** @use HasFactory<StableFactory> */
    use HasFactory;

    protected $table = 'stables';
}
