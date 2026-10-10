<?php

namespace Database\Factories;

use App\Models\PollResponse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PollResponse>
 */
class PollResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'backup_choice' => fake()->numberBetween(1, 4),
            'deploy_choice' => fake()->numberBetween(1, 4),
            'slack_choice' => fake()->numberBetween(1, 4),
        ];
    }
}
