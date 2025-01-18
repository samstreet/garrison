<?php

declare(strict_types=1);

namespace Database\Factories\Buildings;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Model>
 */
abstract class BuildingFactory extends Factory
{
    /**
     * @return array<array-key, mixed>
     */
    public function definition(): array
    {
        return [
            'game_id' => Game::factory(),
        ];
    }
}
