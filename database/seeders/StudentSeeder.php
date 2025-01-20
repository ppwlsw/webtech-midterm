<?php

namespace Database\Seeders;

use App\Models\Student;

use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Fetch users with the 'STUDENT' role
        $users = User::where('role', 'STUDENT')->get();


        // Ensure we have enough users with 'STUDENT' role
        if ($users->isEmpty()) {
            $this->command->info('No users found with the "STUDENT" role.');
            return;
        }

        // Create a Student record for each user with the 'STUDENT' role
        $users->each(function ($user) {

            $first_name = explode(" ",$user->name)[0];
            $last_name = explode(" ",$user->name)[1];
            Student::create([
                'user_id' => $user->id, // Link the user_id to the existing user
                'student_code' => fake()->unique()->isbn10(),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'student_type' => fake()->randomElement(['regular', 'special']),
                'contact_info' => fake()->address(),
                'telephone_num' => fake()->phoneNumber(),
                'admission_channel' => fake()->randomElement(['1', '2', '3']),
                'admission_year' => fake()->year(),
                'completion_year' => fake()->year(),
                'student_status' => fake()->randomElement(['active', 'inactive']),
                'curriculum' => fake()->randomElement(['65', '60']),
            ]);
        });
    }
}
