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
            // Attach each students to random courses
            $studentCourses = $courses->random(rand(1, 3)); // Each students enrolls in 1-3 random courses

            foreach ($studentCourses as $course) {
                DB::table('course_result')->insert([
                    'course_id' => $course->id,
                    'student_id' => $student->id,
                    'semester' => ['1', '2'][array_rand(['1', '2'])], // Random semester
                    'academic_year' => rand(2020, 2025),
                    'course_grade' => ['A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'F'][array_rand(['A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'F'])], // Random grade
                ]);
            }
        }
    }
}
