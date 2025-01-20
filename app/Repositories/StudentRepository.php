<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Traits\RestAPI;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository
{
    use RestAPI;

    private string $model = Student::class;

    public function getStudentByUserId(int $userId): Collection {
        return  $this->model::where('user_id', $userId)->get();
    }

    public function getStudentByStudentCode(string $studentCode): Collection {
        return  $this->model::where('student_code', $studentCode)->get();
    }

    public function filterStudents(array $filters): Collection
    {
        $query = $this->model::query();

        if (isset($filters['course_curriculum'])) {
            $query->whereHas('courses', function ($q) use ($filters) {
                $q->where('course_curriculum', $filters['course_curriculum']);
            });
        }

        if (isset($filters['student_type'])) {
            $query->whereHas('courses', function ($q) use ($filters) {
                $q->where('student_type', $filters['student_type']);
            });
        }

        if (isset($filters['student_name'])) {
            $studentName = preg_replace('/\s+/', ' ', trim($filters['student_name']));
            $nameParts = explode(' ', $studentName);

            $first_name = $nameParts[0] ?? '';
            $last_name = $nameParts[1] ?? '';

            $query->where(function($q) use ($first_name, $last_name) {
                $q->where('first_name', 'LIKE', "%{$first_name}%");
                if (!empty($last_name)) {
                    $q->where('last_name', 'LIKE', "%{$last_name}%");
                }
            });
        }

        if (isset($filters['student_code'])) {
            $query->where('student_code', 'like', '%' . $filters['student_code'] . '%');
        }

        if (isset($filters['course_code']) && is_array($filters['course_code'])) {
            foreach ($filters['course_code'] as $courseCode) {
                $query->whereHas('courses', function ($q) use ($courseCode) {
                    $q->where('course_code', $courseCode);
                });
            }
        }

        return $query->get();
    }




}
