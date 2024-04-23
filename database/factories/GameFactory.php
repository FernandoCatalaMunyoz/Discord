<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'game_name' => $this->faker->name(),
            'description' => $this->faker->name(),
            'game_image' => $this->faker->unique()->safeEmail(),

            // 'game_id'=>rand(1,"hasta el numero de id maximo de juegos")
        ];
    }
}
