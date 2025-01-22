@extends('layouts.nav')
@section('topic','ข่าวสารนิสิต')
@props(['activity'])
<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    //role
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">

        <a href="{{route('announcement')}}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</button>
        </a>

        <!-- Details -->
        <section class="mb-8">
            <div class="flex justify-between items-center mb-6">
                    <div class="flex space-x-7">
                        <h2 class="text-xl font-bold">{{ $activity->activity_name }}</h2>
                        
                        @can('studentView', \App\Models\User::class)
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Join</button>
                        @endcan

                    </div>

                @can('update', \App\Models\User::class)
                    <form action="{{ route('announcement.edit', ['activity' => $activity]) }}" method="GET">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit</button>
                    </form>
                @endcan

            </div>

            <!-- Detail -->
            <div class="bg-gray-200 p-4 rounded-md mb-6">
                <div class="bg-gray-100 p-4 rounded-md shadow-sm pl-6 pr-10 pt-5">
                        <p class="text-gray-700 font-bold">Type</p>
                        <span>{{ $activity->activity_type }}</span>

                        <p class="text-gray-700 font-bold">Start time</p>
                        <span>{{ $activity->start_datetime ?? '-'}}</span>

                        <p class="text-gray-700 font-bold">End time</p>
                        <span>{{ $activity->end_datetime ?? '-'}}</span>

                        <p class="text-gray-700 font-bold">Max participants</p>
                        <span>{{ $activity->max_participants ?? '-' }}</span>

                        <p class="text-gray-700 font-bold">Condition</p>
                        <span>{{ $activity->condition ?? '-' }}</span>

                        <p class="text-gray-700 font-bold">Detail</p>
                        <span>{{ $activity->activity_detail }}</span>
                </div>
            </div>

            <!-- List of Students Joined -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">List of students joined</h3>
                <p>
                    <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md ">0</button>
                    <span> / </span>
                    <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md ">{{ $activity->max_participants }}</button>
                </p>
            </div>
            <div class="bg-gray-100 p-4 rounded-md">
                <!-- Placeholder for list content -->
            </div>
        </section>
    </div>

</div>
</body>
