@extends('layouts.nav')
@section('topic','ข่าวสารนิสิต')
@props(['activities'])
<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    //role
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Announcement -->
            <section class="mb-8">
                <form action="{{ route('announcement.create') }}" method="GET"  class="flex justify-between items-center mb-4">
                    @csrf
{{--                    @method('PUT')--}}
                    <h2 class="text-xl font-bold">Announcement</h2>

                    @can('create', \App\Models\User::class)
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create new announcement
                        </button>
                    @endcan
                </form>

                <div class="grid grid-cols-3 gap-4">

                    @foreach($activities->slice(0, 3) as $activity)
                        <a href="{{ route('announcement.show', ['activity' => $activity]) }}" class="bg-gray-200 p-4 h-72 rounded-md">
                            {{ $activity->activity_name }}
                        </a>
                    @endforeach

                </div>
            </section>

        <!-- Search Bar -->
        <div class="mb-8">
            <form action="{{ route('announcement') }}" method="GET" class="flex">
                @csrf
                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Search..."
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                >
                <button
                    type="submit"
                    class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
                >
                    Search
                </button>
            </form>
        </div>

        <!-- List of Activity -->
        <section>
            <h2 class="text-xl font-bold mb-4">List of Activity</h2>
            <ul class="space-y-4">

                @foreach($filteredActivities as $activity)
                    <li class="bg-white p-4 rounded-md shadow-sm">
                        <a href="{{ route('announcement.show', ['activity' => $activity]) }}">
                            {{ $activity->activity_name }}
                        </a>
                    </li>
                @endforeach

            </ul>

            @if($filteredActivities->isEmpty())
                <p class="text-gray-500 mt-4">No activities found.</p>
            @endif

        </section>
    </div>
</div>

</body>

