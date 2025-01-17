<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Repositories\ActivityRepository;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct(
        private ActivityRepository $activityRepository
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = $this->activityRepository->get();
        return view('announcement.index', ['activities' => $activities]);
//        return ['activities' => $activities];
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        $validatedData = $request->validated();

        $activity = $this->activityRepository->create($validatedData);

        return redirect()->route('announcement.detail', ['activity' => $activity]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view('announcement.detail', ['activity' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        return view('announcement.edit', ['activity' => $activity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $validatedData = $request->validated();

        $this->activityRepository->update($validatedData, $activity->id);

        return redirect()->route('announcement.detail', ['activity' => $activity]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
