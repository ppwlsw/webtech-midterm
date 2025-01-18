@extends('layouts/nav')
@section('topic','ตรวจสอบผลการเรียน')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    //Role
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts/sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">

        <a href="{{route('grade')}}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</button>
        </a>
        <!-- Search Bar -->
        <div class="mb-6">
            <input
                type="text"
                placeholder="search bar"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
            />
        </div>

        <!-- Filter -->
        <div class="bg-gray-200 p-4 rounded mb-6">
            <p class="font-bold mb-2">filter</p>
            <div class="space-y-2">
                <button class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">ปีการศึกษา</button>
                <button class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">ภาคปกติ / ภาคพิเศษ</button>
            </div>
        </div>

        <!-- List -->
        <div class="space-y-4">
            <!-- List Item -->
            <div class="bg-gray-200 p-4 rounded flex justify-between items-center">
                <p class="font-medium">6510405771</p>
                <p>name</p>
            </div>

            <!-- Repeat List Items -->
            <div class="bg-gray-200 p-4 rounded flex justify-between items-center">
                <p class="font-medium">6510405771</p>
                <p>name</p>
            </div>
            <div class="bg-gray-200 p-4 rounded flex justify-between items-center">
                <p class="font-medium">6510405771</p>
                <p>name</p>
            </div>
            <div class="bg-gray-200 p-4 rounded flex justify-between items-center">
                <p class="font-medium">6510405771</p>
                <p>name</p>
            </div>
            <div class="bg-gray-200 p-4 rounded flex justify-between items-center">
                <p class="font-medium">6510405771</p>
                <p>name</p>
            </div>
        </div>

    </div>

</div>
</body>
</html>
