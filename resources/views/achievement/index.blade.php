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
            <a href="{{ route('students.show', ['student' => auth()->user()->student]) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Back
            </a>
            <a href="{{ route('create-achievement') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Add New Achievement
            </a>
        </div>

        <!-- Achievements Section -->
        <section class="bg-white p-6 rounded-md shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Achievements</h2>
            </div>

            <!-- Achievements List -->
            <div class="space-y-4">
                @foreach($achievements as $achievement)
                    <div class="bg-gray-100 p-4 rounded-md shadow-sm">
                        <div class="flex justify-between text-sm text-gray-700 font-medium">
                            <span>{{ $achievement->achievement_type }}</span>
                            <span>{{ $achievement->achievement_year }}</span>
                        </div>
                        <span>{{ $achievement->achievement_name }}</span>
                        <p class="text-gray-600 mt-2">
                            {{ $achievement->achievement_detail }}
                        </p>
                    </div>
                @endforeach
            </div>

            <!-- Achievement Picture -->
{{--            <div class="mt-6">--}}
{{--                <h3 class="text-lg font-bold mb-4">Achievement Picture</h3>--}}
{{--                <div class="bg-gray-200 h-48 rounded-md flex items-center justify-center">--}}
{{--                    <span class="text-gray-500">Picture Placeholder</span>--}}
{{--                </div>--}}
{{--            </div>--}}
        </section>

    </div>

</div>
</body>
