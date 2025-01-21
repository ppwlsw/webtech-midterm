<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\User;
use App\Repositories\ActivityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ActivityController extends Controller
{
    public function __construct(
        private ActivityRepository $activityRepository
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(?Request $request)
    {
        $search = $request->query('search');

        $allActivities = Activity::orderBy('start_datetime', 'desc')->get();

        $filteredActivities = $search
            ? $this->activityRepository->filterByName($search)
            : $allActivities;

        return view('announcement.index', [
            'activities' => $allActivities,
            'filteredActivities' => $filteredActivities,
            'searchTerm' => $search,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', User::class);
        return view('announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        Gate::authorize('create', User::class);
        $validated = $request->validated();

        $activity_name = $validated['activity_name'];
        $activity_type = $validated['activity_type'];
        $activity_detail = $validated['activity_detail'];
        $start_datetime = $validated['start_datetime'];
        $end_datetime = $validated['end_datetime'];
        $max_participants = $validated['max_participants'];
        $condition = $validated['condition'];

        $activity = $this->activityRepository->create([
            'activity_name' => $activity_name,
            'activity_type' => $activity_type,
            'activity_detail' => $activity_detail,
            'start_datetime' => $start_datetime,
            'end_datetime' => $end_datetime,
            'max_participants' => $max_participants,
            'condition' => $condition
        ]);

        return redirect()->route('announcement', ['activity' => $activity]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $activity = $this->activityRepository->getById((int)$request->get('activity'));
        return view('announcement.detail', ['activity' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        Gate::authorize('update', User::class);
        return view('announcement.edit', ['activity' => $activity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        Gate::authorize('update', User::class);
        $validated = $request->validated();

        $this->activityRepository->update([
            'activity_name' => $validated['activity_name'],
            'activity_type' => $validated['activity_type'],
            'activity_detail' => $validated['activity_detail'],
            'start_datetime' => $validated['start_datetime'],
            'end_datetime' => $validated['end_datetime'],
            'max_participants' => $validated['max_participants'],
            'condition' => $validated['condition']
        ], $activity->id);

        return redirect()->route('announcement.show', ['activity' => $activity]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
