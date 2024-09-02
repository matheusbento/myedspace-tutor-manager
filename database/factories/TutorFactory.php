<?php

namespace Database\Factories;

use App\Enums\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tutor>
 */
class TutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'avatar' => $this->faker->image('storage/app/public', 200, 200, null, false),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'hourly_rate' => $this->faker->randomFloat(2, 10, 100),
            'bio' => $this->faker->paragraph(),
            'subjects' => $this->faker->randomElements(Subject::toArray(), $this->faker->numberBetween(1, 5)),
        ];
    }
}
