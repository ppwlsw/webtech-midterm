<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Repositories\StudentGradeRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentGradeController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('first_name', 'like', '%'.$request->search.'%')
                    ->orWhere('last_name', 'like', '%'.$request->search.'%')
                    ->orWhere('student_code', 'like', '%'.$request->search.'%');
            });
        }

        $students = $query->paginate(10);

        return view('enrollments.students', compact('students'));
    }

    public function showEnrolledCourses($studentId)
    {
        $student = Student::findOrFail($studentId);


        $enrolledCourses = DB::table('course_result')
            ->join('courses', 'course_result.course_id', '=', 'courses.id')
            ->where('course_result.student_id', $studentId)
            ->where('course_result.status', 'APPROVED')
            ->select('courses.*', 'course_result.id as result_id', 'course_result.course_grade')
            ->get()
            ->groupBy('course_category');


        return view('enrollments.enrolled-courses', compact('student', 'enrolledCourses'));
    }

    public function editGrade($resultId)
    {

        $courseResult = DB::table('course_result')
            ->join('courses', 'course_result.course_id', '=', 'courses.id')
            ->join('students', 'course_result.student_id', '=', 'students.id')
            ->select('course_result.*', 'courses.course_code', 'courses.course_name', 'students.id as student_id')
            ->where('course_result.id', $resultId)
            ->first();

        return view('enrollments.edit', compact('courseResult'));
    }

    public function updateGrade(Request $request, $resultId)
    {
        $validatedData = $request->validate([
            'course_grade' => 'required|numeric|between:0,4',
            'result_id' => 'required|numeric',
            'course_code' => 'nullable',
            'course_name' => 'nullable',
        ]);


        DB::table('course_result')
            ->where('id', $resultId)
            ->update(['course_grade' => $validatedData['course_grade']]);

//        dd(
//            $request->all(),
//            'Result ID: ' .  $resultId,
//            $validatedData,
//            'Student ID: ' . $request->student_id,
//            DB::table('course_result')->where('student_id', $request->student_id)->get()
//        );

        return redirect()->route('grades.courses', ['studentId' => $request->student_id]);
    }
}
