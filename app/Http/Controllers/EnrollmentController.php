<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use App\Repositories\CourseRepository;
use App\Repositories\EnrollmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EnrollmentController extends Controller
{
    public function __construct(
        private EnrollmentRepository $enrollmentRepository, private CourseRepository $courseRepository
    ){}
    /**
     * Display a listing of the resource.
     */
    public function availableCourses()
    {
        $student = auth()->user()->student;
        $availableCourses = Course::whereDoesntHave('students', function($query) use ($student) {
            $query->where('student_id', $student->id);
        })->paginate(10);



        return view('enrollments.available', compact('availableCourses'));
    }

    public function enroll(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required',
            'semester' => 'required',
            'academic_year' => 'required',
        ]);


        $student = auth()->user()->student;
        $course = Course::findOrFail($validatedData['course_id']);
        $semester = $validatedData['semester'];
        $academicYear = $validatedData['academic_year'];


        if ($this->enrollmentRepository->enrollCourse($student, $course, $semester, $academicYear)) {
            return redirect()->back()->with('success', 'ลงทะเบียนเรียบร้อยแล้ว รอการอนุมัติ');
        }

        return redirect()->back()->with('error', 'ไม่สามารถลงทะเบียนได้ เนื่อจากยังไม่ได้ลงทะเบียนรายวิชาก่อนหน้า');
    }

    public function pendingEnrollments()
    {
        Gate::authorize('teacherView', User::class);
        $pendingEnrollments = $this->enrollmentRepository->getPendingEnrollments();
        return view('enrollments.pending', compact('pendingEnrollments'));
    }

    public function approve(Request $request)
    {
       Gate::authorize('approveEnrollment', User::class);
        $this->enrollmentRepository->approveEnrollment($request->enrollment_id);
        return redirect()->back()->with('success', 'Enrollment approved.');
    }

    public function reject(Request $request)
    {
        Gate::authorize('approveEnrollment', User::class);
        $this->enrollmentRepository->rejectEnrollment($request->enrollment_id);
        return redirect()->back()->with('success', 'Enrollment rejected.');
    }

    public function search(Request $request)
    {
       $student = auth()->user()->student;
        if(isset($request->course_code)){
           $availableCourse =  $this->enrollmentRepository->searchAvailableCourses($student,$request->course_code);
           return view('enrollments.available', ['availableCourses' => $availableCourse]);
        } else {
            return $this->availableCourses();
        }
    }

}
