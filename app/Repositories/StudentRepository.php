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
        return  $this->model::where('id', $id)->first();
    }

    public function filterByCourseIds(array $courseIds): Collection
    {
        return $this->model::whereHas('courses', function ($query) use ($courseIds) {
            foreach ($courseIds as $courseId) {
                $query->where('course_id', $courseId);
            }
        })->get();
    }


}
