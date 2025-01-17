@extends('layouts/nav')
@section('topic','ข่าวสารนิสิต')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts/sidebar')
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <!-- Announcement -->
        <section class="mb-8">
            <a href="{{route('create-announcement')}}" class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Announcement</h2>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create new announcement</button>
            </a>
            <div class="grid grid-cols-3 gap-4">
                <a href="{{route('detail-announcement')}}" class="bg-gray-200 p-4 h-72 rounded-md">Sample Open House</a>
                <div class="bg-gray-200 p-4 h-72 rounded-md"></div>
                <div class="bg-gray-200 p-4 h-72 rounded-md"></div>
            </div>
        </section>

        <!-- Search Bar -->
        <div class="mb-8">
            <input
                type="text"
                placeholder="Search..."
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
            >
        </div>

        <!-- List of Activity -->
        <section>
            <h2 class="text-xl font-bold mb-4">List of Activity</h2>
            <ul class="space-y-4">
                <li class="bg-white p-4 rounded-md shadow-sm">
                    Test text content
                </li>
                <!-- Add activities here -->
            </ul>
        </section>
    </div>
</div>

</body>

