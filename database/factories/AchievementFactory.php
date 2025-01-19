<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $achievement_name = $this->faker->words(3, true);
        $achievement_detail = $this->faker->realText(255);
        $achievement_year = $this->faker->year();
        $achievement_type = $this->faker->randomElement(['Competition', 'Academic Excellence', 'Reputation', 'Sport', 'Other']);

        return [
            'student_id' => fake()->randomElement(Student::all()->pluck('id')->toArray()),
            'achievement_name' => $achievement_name,
            'achievement_detail' => $achievement_detail,
            'achievement_year' => $achievement_year,
            'achievement_type' => $achievement_type,
        ];
    }
}
