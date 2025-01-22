<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumni>
 */
class AlumniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $workplace = $this->faker->company();
        $contribution = $this->faker->realText(255);

        return [
            'student_id' => fake()->randomElement(Student::where('student_status','inactive')->pluck('id')->toArray()),
            'workplace' => $workplace,
            'contribution' => $contribution,
        ];
    }
}
