<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();
        $students = Student::all();

        foreach ($students as $student) {
            // Attach each student to random courses
            $studentCourses = $courses->random(rand(1, 40));

            foreach ($studentCourses as $course) {
                DB::table('course_result')->insert([
                    'course_id' => $course->id,
                    'student_id' => $student->id,
                    'semester' => fake()->randomElement([1,1.5,2,2.5,3,3.5,4]),
                    'academic_year' => rand(2020, 2025),
                    'course_grade' => fake()->randomElement([1,1.5,2,2.5,3,3.5,4]) , // Random grade
                ]);
            }
        }
    }
}
