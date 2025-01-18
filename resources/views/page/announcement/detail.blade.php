@extends('layouts/nav')
@section('topic','ข่าวสารนิสิต')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts/sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">

        <a href="{{route('announcement')}}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</button>
        </a>

        <!-- Open House Details -->
        <section class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">ช่วย Open House</h2>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit</button>
            </div>

            <!-- Detail -->
            <div class="bg-gray-200 p-4 rounded-md mb-6">
                <p class="text-gray-700">Detail</p>
            </div>

            <!-- List of Students Joined -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">List of students joined</h3>
                <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Amount</button>
            </div>
            <div class="bg-gray-100 p-4 rounded-md">
                <!-- Placeholder for list content -->
            </div>
        </section>

    </div>

</div>
</body>
