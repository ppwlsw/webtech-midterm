<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Repositories\AlumniRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function __construct(
        private AlumniRepository $alumniRepository,
        private StudentRepository $studentRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumni = $this->alumniRepository->get();

        return view('alumni.index', ['alumni' => $alumni]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grade.create-alumni');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = $this->studentRepository->getStudentByUserId(auth()->id());

        $workplace = $request->get('workplace');
        $contribution = $request->get('contribution');

        $alumni = $this->alumniRepository->create([
            'student_id' => $student->id,
            'workplace' => $workplace ?? null,
            'contribution' => $contribution ?? null
        ]);

        return redirect()->route('grade.alumni', ['alumni' => $alumni]);
//        return ['alumni' => $alumni];

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $alumus_id = $request->get('alumnus');
        $alumnus = $this->alumniRepository->getById($alumus_id);
        return view('alumni.show', ['alumnus' => $alumnus]);
    }

    /**
     * Show the form for editing the tspecified resource.
     */
    public function edit(Alumni $alumni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumni $alumni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni)
    {
        //
    }
}
