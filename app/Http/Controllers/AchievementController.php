<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAchievementRequest;
use App\Models\Achievement;
use App\Models\Student;
use App\Repositories\AchievementRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function __construct(
        private AchievementRepository $achievementRepository,
        private StudentRepository $studentRepository,
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();
        $student_id = $this->studentRepository->getStudentByUserId($user_id)->id;

//        $achievements = $this->studentRepository->getStudentByUserId($student_id)->achievement;
//        $achievements = $this->achievementRepository->getAll();
        $achievements = $this->achievementRepository->getAchievementByStudentId($student_id);
        return view('achievement.index', ['achievements' => $achievements]);
//        return ['achievements' => $achievements];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('achievement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAchievementRequest $request)
    {
        //dd($request);
        $student_id = auth()->user()->student->id;

        // Validate the request data
        $validated = $request->validate([
            'achievement_name' => 'required|string|max:255',
            'achievement_type' => 'required|string|max:255',
            'achievement_year' => 'required|integer',
            'achievement_detail' => 'required|string',
        ]);

        // Add the student_id to the validated data
        $validated['student_id'] = $student_id;

        // Debugging output (optional)
//        dd($validated);


        // Save the data to the database
//        Achievement::creating($validated);
        $this->achievementRepository->create($validated);
        $achievements = $this->achievementRepository->getAchievementByStudentId($student_id);

        return redirect()->route('achievement', ['achievement' => $achievements]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        return view('achievement.index', ['achievement' => $achievement]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        // students cannot edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        // students cannot update
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        //
    }
}
