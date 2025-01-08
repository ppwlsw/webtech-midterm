<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $fake = \Faker\Factory::create();
        $student_code = $this->faker->unique()->isbn10();
        $first_name = $this->faker->firstName();
        $last_name = $this->faker->lastName();
        $student_type = $this->faker->randomElement(['regular','special']);
        $contact_info = $this->faker->address();
        $telephone_num = $this->faker->phoneNumber();
        $admission_channel = $this->faker->randomElement(['1','2','3']);
        $admission_year = $this->faker->year();
        $completion_year = $this->faker->year();
        $student_status = $this->faker->randomElement(['active','inactive']);
        $curriculum = $this->faker->randomelement(['65','60']);
        return [
            'student_code' => $student_code,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'student_type' => $student_type,
            'contact_info' => $contact_info,
            'telephone_num' => $telephone_num,
            'admission_channel' => $admission_channel,
            'admission_year' => $admission_year,
            'completion_year' => $completion_year,
            'student_status' => $student_status,
            'curriculum' => $curriculum,
        ];
    }
}
