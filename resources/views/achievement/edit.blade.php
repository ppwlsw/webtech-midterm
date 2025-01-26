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
        <section class="bg-white p-6 rounded-md shadow-md">
            <h2 class="text-xl font-bold">Achievement</h2>

            <!-- Detail Content -->
            <div class="mt-6 space-y-4">

                <!-- Picture -->
                <div class="mt-6">
                    <form action="{{route('update-achievement', ['achievement' => $achievement->id])}}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
{{--                        @method('PATCH')--}}

                        <!-- Information -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Type</label>
                            <input
                                type="text"
                                id="achievement_type"
                                name="achievement_type"
                                value="{{ old('achievement_type', $achievement->achievement_type ?? '') }}"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <input
                                type="text"
                                id="achievement_name"
                                name="achievement_name"
                                value="{{ old('achievement_name', $achievement->achievement_name ?? '') }}"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Year</label>
                            <input
                                type="text"
                                id="achievement_year"
                                name="achievement_year"
                                value="{{ old('achievement_year', $achievement->achievement_year ?? '') }}"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Detail</label>
                            <textarea
                                id="achievement_detail"
                                name="achievement_detail"
                                rows="4"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                            >{{ old('achievement_detail', $achievement->achievement_detail ?? '') }}
                            </textarea>
                        </div>


                        {{--                    <h3 class="text-lg font-bold mb-4">Achievement Picture</h3>--}}
                        {{--                    <div class="bg-gray-200 h-48 rounded-md flex items-center justify-center">--}}
                        {{--                        <span class="text-gray-500">Picture Placeholder</span>--}}
                        {{--                    </div>--}}


                        <!-- Button -->
                        <div class="flex justify-between">
                            <a href="{{route('achievement')}}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</a>
                            <a href="{{route('update-achievement', ['achievement' => $achievement->id])}}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                <button type="submit">
                                    Save
                                </button>
                            </a>

                        </div>
                    </form>
                </div>
            </div>

        </section>

    </div>

</div>
</body>
