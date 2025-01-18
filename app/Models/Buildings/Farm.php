<?php

declare(strict_types=1);

namespace App\Models\Buildings;

use Database\Factories\Buildings\FarmFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Building<self>
 */
class Farm extends Building
{
    /** @use HasFactory<FarmFactory> */
    use HasFactory;

    protected $table = 'farms';
}
