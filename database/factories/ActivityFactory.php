<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $activity_name = $this->faker->words(3, true);
        $activity_type = $this->faker->randomElement(['Workshop', 'Seminar', 'Competition', 'Department']);
        $activity_details = $this->faker->realText(255);
        $max_participants = $this->faker->numberBetween(10, 200);
        $condition = $this->faker->randomElement([
            'Open to all students',
            'Registration required',
            'Only 3rd year students',
            'Limited seats available'
        ]);

        $start_datetime = $this->faker->dateTimeBetween('now', '+1 month');
        $random_days = $this->faker->numberBetween(1, 7);
        $end_datetime = (clone $start_datetime)->modify("+{$random_days} days");

        return [
            'activity_name' => $activity_name,
            'activity_type' => $activity_type,
            'activity_detail' => $activity_details,
            'max_participants' => $max_participants,
            'start_datetime' => $start_datetime,
            'end_datetime' => $end_datetime,
            'condition' => $condition,
        ];
    }
}
