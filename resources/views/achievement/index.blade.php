@extends('layouts.nav')
@section('topic', 'ข่าวสารนิสิต')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">

        <!-- Navigation Buttons -->
        <div class="flex justify-between mb-6">
            <a href="{{ route('students.show', ['student' => auth()->user()->student]) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 shadow">
                Back
            </a>
            <a href="{{ route('create-achievement') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 shadow">
                Add New Achievement
            </a>
        </div>

        <!-- Achievements Section -->
        <section class="bg-white p-6 rounded-md shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Achievements</h2>
            </div>

            <!-- Achievements List -->
            <div class="space-y-4">
                @foreach($achievements as $achievement)
                    <div class="bg-gray-50 p-6 rounded-md shadow-sm border border-gray-200">
                        <form action="{{route("edit-achievement", ['achievementId' => $achievement->id])}}" method="GET">
                            @csrf
                            <div class="flex justify-between items-center text-lg font-medium">
                                <!-- Achievement Type -->
                                <span class="bg-blue-100 text-blue-700 py-1 px-3 rounded-full shadow-sm">
                                    {{ $achievement->achievement_type }}
                                </span>
                                <!-- Achievement Year -->
                                <span class="bg-green-100 text-green-700 py-1 px-3 rounded-full shadow-sm">
                                    {{ $achievement->achievement_year }}
                                </span>
                            </div>

                            <!-- Achievement Name -->
                            <div class="mt-2">
                                <h3 class="text-xl font-semibold text-gray-800">
                                    {{ $achievement->achievement_name }}
                                </h3>
                            </div>

                            <!-- Achievement Details -->
                            <p class="text-gray-600 mt-2">
                                {{ $achievement->achievement_detail }}
                            </p>

                            <!-- Edit Button -->
                            <div class="flex justify-end mt-4">
                                <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 shadow">
                                    Edit
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
</body>
