<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\Student;
use App\Models\User;
use App\Repositories\ActivityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $filter = $request->query('filter');

        $allActivities = Activity::orderBy('created_at', 'desc')->get();

        $filteredActivities = $search
            ? $this->activityRepository->filterByName($search)
            : $allActivities;

        if ($filter) {
            $filteredActivities = $filteredActivities->filter(function ($activity) use ($filter) {
                $now = now();

                if ($filter === 'full') {
                    return $activity->students->count() >= $activity->max_participants
                        ? $activity->max_participants
                        : false;
                } elseif ($filter === 'can-join') {
                    return $activity->join_start_datetime && $activity->join_end_datetime && $activity->students->count() < $activity->max_participants
                        ? $now->between($activity->join_start_datetime, $activity->join_end_datetime)
                        : false;
                } elseif ($filter === 'not-started') {
                    return $activity->start_datetime
                        ? $now->isBefore($activity->start_datetime)
                        : false;
                } elseif ($filter === 'ended') {
                    return $activity->end_datetime
                        ? $now->isAfter($activity->end_datetime)
                        : false;
                } elseif ($filter === 'ongoing') {
                    return $activity->start_datetime && $activity->end_datetime
                        ? $now->between($activity->start_datetime, $activity->end_datetime)
                        : false;
                } elseif ($filter === 'cannot-join') {
                    return $activity->join_end_datetime
                        ? $now->isAfter($activity->join_end_datetime)
                        : false;
                }
                return true;
            });
        }

        return view('announcement.index', [
            'activities' => $allActivities,
            'filteredActivities' => $filteredActivities,
            'searchTerm' => $search,
            'currentFilter' => $filter,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', User::class);

        $activityTypes = DB::table('activities')
            ->distinct()
            ->pluck('activity_type');

        $conditions = DB::table('activities')
            ->distinct()
            ->whereNotNull('condition')
            ->where('condition', '!=', '')
            ->pluck('condition');

        return view('announcement.create', compact('activityTypes', 'conditions'));
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
        $join_start_datetime = $validated['join_start_datetime'] ?? null;
        $join_end_datetime = $validated['join_end_datetime'] ?? null;
        $start_datetime = $validated['start_datetime'] ?? null;
        $end_datetime = $validated['end_datetime'] ?? null;
        $max_participants = $validated['max_participants'] ?? null;
        $condition = $validated['condition'] ?? null;

        $activity = $this->activityRepository->create([
            'activity_name' => $activity_name,
            'activity_type' => $activity_type,
            'activity_detail' => $activity_detail,
            'join_start_datetime' => $join_start_datetime,
            'join_end_datetime' => $join_end_datetime,
            'start_datetime' => $start_datetime,
            'end_datetime' => $end_datetime,
            'max_participants' => $max_participants,
            'condition' => $condition
        ]);

        return redirect()->route('announcement', ['activity' => $activity])
            ->with('success', 'บันทึกการสร้างเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $activity = $this->activityRepository->getById((int)$request->get('activity'));
        $students = $activity->students;

        return view('announcement.detail', [
            'activity' => $activity,
            'students' => $students,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        Gate::authorize('update', User::class);

        $activityTypes = DB::table('activities')
            ->distinct()
            ->pluck('activity_type');

        $conditions = DB::table('activities')
            ->distinct()
            ->whereNotNull('condition')
            ->where('condition', '!=', '')
            ->pluck('condition');

        return view('announcement.edit', ['activity' => $activity], compact('activityTypes', 'conditions'));
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
            'join_start_datetime' => $validated['join_start_datetime'],
            'join_end_datetime' => $validated['join_end_datetime'],
            'start_datetime' => $validated['start_datetime'],
            'end_datetime' => $validated['end_datetime'],
            'max_participants' => $validated['max_participants'],
            'condition' => $validated['condition']
        ], $activity->id);

        return redirect()->route('announcement.show', ['activity' => $activity])
            ->with('success', 'บันทึกการแก้ไขเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }

    public function showStudentHistory(Request $request)
    {
        $student = auth()->user()->student;

        if (!$student) {
            return redirect()->route('home')->withErrors('Student record not found.');
        }

        $activities = $student->activities()->with('students')->get();

        return view('activity.index', [
            'student' => $student,
            'activities' => $activities,
        ]);
    }
}
