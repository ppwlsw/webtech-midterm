<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Traits\RestAPI;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository
{
    use RestAPI;

    private string $model = Student::class;

    public function getStudentById(int $id): Collection {
        return  $this->model::where('id', $id)->get();
    }

    public function filterByCourseIds(array $courseIds): Collection
    {
        return $this->model::whereHas('courses', function ($query) use ($courseIds) {
            foreach ($courseIds as $courseId) {
                $query->where('course_id', $courseId);
            }
        })->get();
    }

    public function filterStudents(array $filters): Collection
    {
        return $this->model::whereHas('courses', function ($query) use ($filters) {
            if (isset($filters['course_curriculum'])) {
                $query->where('course_curriculum', $filters['course_curriculum']);
            }

            if (isset($filters['student_type'])) {
                $query->where('student_type', $filters['student_type']);
            }

            if (isset($filters['student_name'])) {
                // Normalize the input to remove extra spaces or special characters
                $studentName = preg_replace('/\s+/', ' ', trim($filters['student_name'])); // Remove extra spaces
                $nameParts = explode(' ', $studentName);

                // Handle cases with missing or malformed names
                $first_name = $nameParts[0] ?? '';
                $last_name = $nameParts[1] ?? '';

                printf("First Name: %s, Last Name: %s", $first_name, $last_name);

                $query->where('first_name', 'LIKE', "%{$first_name}%");
                if (!empty($last_name)) {
                    $query->where('last_name', 'LIKE', "%{$last_name}%");
                }
            }

            if (isset($filters['student_code'])) {
                $query->where('student_code', 'like', '%' . $filters['student_code'] . '%');
            }

            if (isset($filters['course_code'])) {
                foreach ($filters['course_code'] as $courseCode) {
                    $query->where('course_code', $courseCode);
                }
            }

           if (isset($filters['course_ids'])) {
               foreach ($filters['course_ids'] as $courseId) {
                   $query->where('course_id', $courseId);
               }
           }
        })->get();
    }

}
