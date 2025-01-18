<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

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
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    public function getStudents(Request $request)
    {
       return $this->studentRepository->getAll();
    }

    public function queryStudents(Request $request){
        $curriculum = $request->get('course_curriculum') ;
        $student_type = $request->get('student_type');
        $student_name = $request->get('student_name');
        $student_code = $request->get('student_code');
        $course_code = $request->get('course_code');
        $course_code = json_decode(str_replace("'", '"',$course_code ), true);

//dd($course_code, $student_type, $student_name, $curriculum, $student_code);

        $request = [
            'course_curriculum' => $curriculum,
            'student_type' => $student_type,
            'student_name' => $student_name,
            'student_code' => $student_code,
            'course_code' => $course_code,
        ];

        return $this->studentRepository->filterStudents($request);

    }
}
