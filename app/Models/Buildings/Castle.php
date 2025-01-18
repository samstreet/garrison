<?php

declare(strict_types=1);

namespace App\Models\Buildings;

use Database\Factories\Buildings\CastleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Building<self>
 */
class Castle extends Building
{
    /** @use HasFactory<CastleFactory> */
    use HasFactory;

    protected $table = 'castles';
}
