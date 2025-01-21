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
        return view('announcement.index', [
            'activities' => $activities
        ]);
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
        $request->validated();

        $activity_name = $request->get('activity_name');
        $activity_type = $request->get('activity_type');
        $activity_detail = $request->get('activity_detail');
        $start_datetime = $request->get('start_datetime');
        $end_datetime = $request->get('end_datetime');
        $max_participants = $request->get('max_participants');
        $condition = $request->get('condition');

        $activity = $this->activityRepository->create([
            'activity_name' => $activity_name,
            'activity_type' => $activity_type,
            'activity_detail' => $activity_detail,
            'start_datetime' => $start_datetime,
            'end_datetime' => $end_datetime,
            'max_participants' => $max_participants,
            'condition' => $condition
        ]);

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
        $request->validated();

        $this->activityRepository->update([
            'activity_name' => $request->input('activity_name'),
            'activity_type' => $request->input('activity_type'),
            'activity_detail' => $request->input('activity_detail'),
            'start_datetime' => $request->input('start_datetime'),
            'end_datetime' => $request->input('end_datetime'),
            'max_participants' => $request->input('max_participants'),
            'condition' => $request->input('condition')
        ], $activity->id);

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
