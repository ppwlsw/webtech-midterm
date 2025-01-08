<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coursesCS60 = Storage::json('CleanCSCourse60.json');
        $coursesCS65 = Storage::json('CleanCSCourse65.json');
        $coursesGenEd64 = Storage::json('CleanGenEd64.json');

        $arr = [ "2560" => $coursesCS60, "2565" => $coursesCS65, "2564" => $coursesGenEd64];


        foreach ($arr as $key => $value) {
            foreach($value as $course){
                Course::create([
                    'course_code' => $course['course_number'],
                    'course_name' => $course['course_name'],
                    'course_curriculum' => $key,
                    'course_category' => $course['course_category'],
                    'prerequisite_course' => $course['prerequisite_course_id'],
                    'credit' => $course['credit'],
                ]);
            }
        }


    }


}
