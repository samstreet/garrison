<?php

namespace App\Services;

interface ICreateable
{
    /**
     * @param array<array-key, mixed> $attributes
     */
    public function create(array $attributes): mixed;
}
