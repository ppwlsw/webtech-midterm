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


    public function getEnrolledCourseByStudentCode(Request $request)
    {
        dd($request);
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
}
