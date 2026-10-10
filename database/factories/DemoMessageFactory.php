<?php

namespace Database\Factories;

use App\Models\DemoMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DemoMessage>
 */
class DemoMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message' => fake()->sentence(),
        ];
    }
}
