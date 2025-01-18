<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

interface ICreateable
{
    /**
     * @param  array<array-key, mixed>  $attributes
     */
    public function create(Model $model, array $attributes): mixed;
}
