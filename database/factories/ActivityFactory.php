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
            'เฉพาะนิสิตรหัส 65',
            'เฉพาะนิสิตรหัส 64',
            'นิสิตทุกชั้นปี'
        ]);

        $join_start_datetime = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $random_join = $this->faker->numberBetween(1, 15);
        $join_end_datetime = (clone $join_start_datetime)->modify("+{$random_join} days");

        $random_days = $this->faker->numberBetween(1, 15);
        $start_datetime = (clone $join_end_datetime)->modify("+{$random_days} days");
        $end_datetime = (clone $start_datetime)->modify("+{$random_days} days");

        return [
            'activity_name' => $activity_name,
            'activity_type' => $activity_type,
            'activity_detail' => $activity_details,
            'max_participants' => $max_participants,
            'join_start_datetime' => $join_start_datetime,
            'join_end_datetime' => $join_end_datetime,
            'start_datetime' => $start_datetime,
            'end_datetime' => $end_datetime,
            'condition' => $condition,
        ];
    }
}
