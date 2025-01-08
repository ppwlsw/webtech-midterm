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


        $activity_name = $this->faker->unique()->name();
        $activity_type = $this->faker->creditCardType();
        $activity_details = $this->faker->text();
        $max_participants = $this->faker->numberBetween(2, 10);
        $condition = $this->faker->unique()->text();
        $start_date = $this->faker->date();
        $end_date = $this->faker->date();

        return [
            'activity_name' => $activity_name,
            'activity_type' => $activity_type,
            'activity_detail' => $activity_details,
            'max_participants' => $max_participants,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'condition' => $condition,
        ];
    }
}
