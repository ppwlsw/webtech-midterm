<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class EnrollmentRepository
{
    public function enrollCourse(Student $student, Course $course, $semester, $academicYear)
    {
//        dd($student, $course, $semester, $academicYear);
        if ($this->isAlreadyEnrolled($student, $course)) {
            return false;
        }

        // Check prerequisites if exists
        if ($course->prerequisite_course && !$this->checkPrerequisite($student, $course)) {
            return false;
        }

        // Attach course with pending status
        $student->courses()->attach($course, [
            'academic_year' => $academicYear,
            'semester' => $semester,
            'status' => 'PENDING',
            'enrolled_at' => now()
        ]);

        return true;
    }

    private function isAlreadyEnrolled(Student $student, Course $course): bool
    {
        return $student->courses()->where('course_id', $course->id)->exists();
    }

    private function checkPrerequisite(Student $student, Course $course): bool
    {
        return DB::table('course_result')
            ->join('courses', 'course_result.course_id', '=', 'courses.id')
            ->where('course_result.student_id', $student->id)
            ->where('courses.course_code', $course->prerequisite_course)
            ->where('course_result.status', 'APPROVED')
            ->exists();
    }

    public function getPendingEnrollments()
    {

        return DB::table('course_result')
            ->where('status', 'PENDING')
            ->join('students', 'course_result.student_id', '=', 'students.id')
            ->join('courses', 'course_result.course_id', '=', 'courses.id')
            ->select('students.first_name', 'students.last_name', 'courses.course_name', 'courses.course_code', 'course_result.id', 'course_curriculum')
            ->get();
    }

    public function approveEnrollment($enrollmentId)
    {
        return DB::table('course_result')
            ->where('id', $enrollmentId)
            ->update([
                'status' => 'APPROVED',
            ]);
    }

    public function rejectEnrollment($enrollmentId)
    {
        return DB::table('course_result')->where('id', $enrollmentId)->delete();

    }

    public function searchAvailableCourses(Student $student, ?string $query = null)
    {
        return Course::whereDoesntHave('students', function($q) use ($student) {
            $q->where('student_id', $student->id);
        })
            ->when($query, function ($q) use ($query) {
                return $q->where(function($subQuery) use ($query) {
                    $searchTerms = explode(' ', $query);

                    foreach ($searchTerms as $term) {
                        $subQuery->where(function($innerQuery) use ($term) {
                            $innerQuery->Where('course_code', 'LIKE', "%{$term}%")
                                ->orWhere('course_category', 'LIKE', "%{$term}%");
                        });
                    }
                });
            })
            ->orderBy('course_code')
            ->paginate(10);
    }


}
