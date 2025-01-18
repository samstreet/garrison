<?php

declare(strict_types=1);

namespace App\Models\Buildings;

use Database\Factories\Buildings\ArmouryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Building<self>
 *
 * @method static ArmouryFactory factory($count = null, $state = [])
 */
class Armoury extends Building
{
    /** @use HasFactory<ArmouryFactory> */
    use HasFactory;

    protected $table = 'armouries';

    protected $fillable = [
        'health'
    ];
}
