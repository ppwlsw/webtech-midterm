<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Repositories\CourseRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    public function __construct(
        private StudentRepository $studentRepository,
        private CourseRepository $courseRepository,
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('teacherView', User::class)) {
            return $this->staffIndex(new Request());
        }

        $student = $this->studentRepository->getStudentByUserId(auth()->guard()->user()->id);
        $courses = $this->studentRepository->getStudentEnrolledCourses($student->id);
        return view('grade.index', ["data" => $student
                                        , "coursesData" => $courses ]);

    }
    public function show(Student $student)
    {
        //
        return view('students.show', [
            'student' => $this->studentRepository->getById(auth()->user()->student->id),
        ]);
    }
    public function profileIndex()
    {
        if (Gate::allows('studentView', User::class)) {
            $userId = auth()->guard()->user()->id;
            $data = $this->studentRepository->getStudentByUserId($userId);
           return view('profile.index',["data" => $data]);
        }
    }

    public function editStudentsPage(){
            return view('grade.student-list', ["data" => $this->studentRepository->getAll()]);
    }

    public function getEnrolledCourseByStudentCode(Request $request)
    {
       return $this->staffIndex($request);
    }

    public function getAllStudents(Request $request)
    {
        Gate::authorize('getAllStudents', User::class);
        return $this->studentRepository->getAll();
    }

    public function queryStudents(Request $request){
        Gate::authorize('teacherView', User::class);
        $curriculum = $request->get('course_curriculum') ;
        $student_type = $request->get('student_type');
        $student_name = $request->get('student_name');
        $student_code = $request->get('student_code');
        $course_code = $request->get('course_code');


        $request = [
            'course_curriculum' => $curriculum,
            'student_type' => $student_type,
            'student_name' => $student_name,
            'student_code' => $student_code,
            'course_code' => $course_code,
        ];
        return $this->studentRepository->filterStudents($request);

    }

    public function staffIndex(Request $request){
        Gate::authorize('teacherView', User::class);

        $data = $this->queryStudents($request);
        if ($data->has('message')) {
            return view('grade.index', ["data" => $data]);
        }
        foreach ($data as $student) {
            $student->courses = $student->courses()->select(
                'course_code',
                'course_name',
                'credit',
                'course_grade'
            )->get()->toArray();
        }

        return view('grade.index', ["data" => $data]);
    }


    public function search(Request $request)
    {
        $query = Student::query();

        // Search by student code
        if ($request->filled('student_code')) {
            $studentCode = $request->student_code;
            $query->where('student_code', 'LIKE', "%{$studentCode}%");
        }

        // Search by name (first name or last name)
        if ($request->filled('name')) {
            $name = $request->name;
            $query->where(function($q) use ($name) {
                $q->where('first_name', 'LIKE', "%{$name}%")
                    ->orWhere('last_name', 'LIKE', "%{$name}%");
            });
        }

        // Search by curriculum
        if ($request->filled('curriculum')) {
            $curriculum = $request->curriculum;
            $query->where('curriculum', 'LIKE', "%{$curriculum}%");
        }

        // Search by student type
        if ($request->filled('student_type')) {
            $studentType = $request->student_type;
            $query->where('student_type', $studentType);
        }

        // Search by status
        if ($request->filled('status')) {
            $status = $request->status;
            $query->where('student_status', $status);
        }


        $data = $query->get();

        return view('grade.student-list', ["data" => $data]);
    }

    public function edit(Student $student)
    {
        return view('grade.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'student_type' => 'required',
            'student_status' => 'required',
            'curriculum' => 'required',
            'completion_year' => 'required',
            'contact_info' => 'required',
            'telephone_num' => 'required',
        ]);

        $student->update($validated);

        return redirect()->route('edit-student', $student)
            ->with('success', 'อัปเดตข้อมูลนิสิตเรียบร้อยแล้ว');
    }

}
