<?php

declare(strict_types=1);

namespace App\Models\Buildings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static mixed factory($count = null, $state = [])
 */
abstract class Building extends Model
{
    protected int $health = 100;
}
