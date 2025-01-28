@extends('layouts.nav')
@section('topic','ข่าวสารนิสิต')
{{--@dd($achievement)--}}
<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">

        <!-- Achievement -->
        <section class="bg-white p-6 rounded-md shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Achievement</h2>

            <!-- Detail Content -->
            <div class="mt-6 space-y-6">

                <div>
                    <form action="{{route('update-achievement', ['achievement' => $achievement->id])}}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Type -->
                        <div>
                            <label for="achievement_type" class="block text-sm font-medium text-gray-700 mb-2">
                                Type
                            </label>
                            <input
                                type="text"
                                id="achievement_type"
                                name="achievement_type"
                                value="{{ old('achievement_type', $achievement->achievement_type ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400"
                                placeholder="Enter achievement type"
                            >
                        </div>

                        <!-- Name -->
                        <div>
                            <label for="achievement_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Name
                            </label>
                            <input
                                type="text"
                                id="achievement_name"
                                name="achievement_name"
                                value="{{ old('achievement_name', $achievement->achievement_name ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400"
                                placeholder="Enter achievement name"
                            >
                        </div>

                        <!-- Year -->
                        <div>
                            <label for="achievement_year" class="block text-sm font-medium text-gray-700 mb-2">
                                Year
                            </label>
                            <input
                                type="text"
                                id="achievement_year"
                                name="achievement_year"
                                value="{{ old('achievement_year', $achievement->achievement_year ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400"
                                placeholder="Enter year"
                            >
                        </div>

                        <!-- Detail -->
                        <div>
                            <label for="achievement_detail" class="block text-sm font-medium text-gray-700 mb-2">
                                Detail
                            </label>
                            <textarea
                                id="achievement_detail"
                                name="achievement_detail"
                                rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400"
                                placeholder="Enter detailed description"
                            >{{ old('achievement_detail', $achievement->achievement_detail ?? '') }}</textarea>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-between items-center">
                            <a href="{{route('achievement')}}" class="py-2 px-4 bg-gray-500 text-white rounded-lg shadow-md hover:bg-gray-600">
                                Back
                            </a>
                            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </section>

    </div>

</div>
</body>
