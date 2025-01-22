<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Traits\RestAPI;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository
{
    use RestAPI;

    private string $model = Student::class;

    public function getStudentByUserId(int $userId)  {
        return  $this->model::where('user_id', $userId)->first();
    }

    public function getStudentByStudentCode(string $studentCode) {
        return  $this->model::where('student_code', $studentCode)->first();
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

        if (isset($filters['student_code'])) {
            $query->where('student_code', 'like', '%' . $filters['student_code'] . '%');
        }

        if (!empty($filters['course_code'])) {
            $courseCodes = explode(',', $filters['course_code']);

            // Ensure at least one student is enrolled in the specified course(s)
            $hasEnrolledStudents = $this->model::whereHas('courses', function ($q) use ($courseCodes) {
                $q->whereIn('course_code', $courseCodes);
            })->exists();

            if (!$hasEnrolledStudents) {
               return new Collection([
                   'message' => 'ไม่มีนักเรียนที่ลงทะเบียนในวิชาที่ระบุ'
               ]);
            }

            // Filter query to only include students who are enrolled in at least one of the specified courses
            $query->whereHas('courses', function ($q) use ($courseCodes) {
                $q->whereIn('course_code', $courseCodes);
            });
        }


        return $query->get();
    }

    public function getStudentEnrolledCourses(int $studentId) {
        $student = $this->model::find($studentId);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $enrolledCourses = $student->courses()->select(
            'course_code',
            'course_name',
            'credit',
            'course_grade')->get();

        return $enrolledCourses;
    }


}
