<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAchievementRequest;
use App\Models\Achievement;
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

        $achievements = $this->studentRepository->getStudentByUserId($user_id)->achievement;
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
        $validated = $request->validated();

        $achievement = $this->achievementRepository->create($validated);

        return redirect()->route('achievement.index', ['achievement' => $achievement]);
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
