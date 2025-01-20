<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    public function __construct(
        private StudentRepository $studentRepository,
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', [
            'student' => $this->studentRepository->getById(auth()->user()->student->id),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //return
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }


    public function getStudentByUserId(Request $request){
        $userId = auth()->guard()->user()->id;
//        dd($this->studentRepository->getStudentByUserId($userId));
        return $this->studentRepository->getStudentByUserId($userId);
    }

    public function getAllStudents(Request $request)
    {
        Gate::authorize('getAllStudents', User::class);
        return $this->studentRepository->getAll();
    }

    public function queryStudents(Request $request){
        $curriculum = $request->get('course_curriculum') ;
        $student_type = $request->get('student_type');
        $student_name = $request->get('student_name');
        $student_code = $request->get('student_code');
        $course_code = $request->get('course_code');
        $course_code = json_decode(str_replace("'", '"',$course_code ), true);


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
        $data = $this->queryStudents($request);

        return view('/ui_staff/grade/list_grade', ["data" => $data]);
    }


}
