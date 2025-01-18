@extends('layouts.nav')
@section('topic','ข่าวสารนิสิต')

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
                <div class="bg-gray-100 p-4 rounded-md shadow-sm">
                    <p class="text-gray-600 mt-2">Achievement Detail</p>
                    <p class="text-gray-600 mt-2">Achievement Type</p>
                </div>

                <!-- Picture -->
                <div class="mt-6">
                    <h3 class="text-lg font-bold mb-4">Achievement Picture</h3>
                    <div class="bg-gray-200 h-48 rounded-md flex items-center justify-center">
                        <span class="text-gray-500">Picture Placeholder</span>
                    </div>
                </div>

                <!-- Button -->
                <div class="flex justify-between">
                    <a href="{{route('achievement')}}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</a>
                    <a href="{{route('achievement')}}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</a>
                </div>

        </section>

    </div>

</div>
</body>
