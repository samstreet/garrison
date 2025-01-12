<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Player>
 */
class PlayerFactory extends Factory
{
    protected static ?string $password;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'uuid' => Str::uuid()->toString(),
            'level' => 1,
            'wins' => 0,
            'losses' => 0,
        ];
    }
}
