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

        <!-- Student Profile -->
        <section class="bg-white p-6 rounded-md shadow-md">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-6">Student Profile</h2>
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit</button>
            </div>


            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-700">First Name</p>
                        <p class="text-gray-900">John</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Last Name</p>
                        <p class="text-gray-900">Doe</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Student Code</p>
                        <p class="text-gray-900">12345678</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Curriculum</p>
                        <p class="text-gray-900">Computer Science</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Student Type</p>
                        <p class="text-gray-900">Full-time</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Address</p>
                        <p class="text-gray-900">123 Main Street, Hometown</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Telephone Number</p>
                        <p class="text-gray-900">(123) 456-7890</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Admission Channel</p>
                        <p class="text-gray-900">Direct Entry</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Year</p>
                        <p class="text-gray-900">2023</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Student Status</p>
                        <p class="text-gray-900">Active</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Completion Year</p>
                        <p class="text-gray-900">2025</p>
                    </div>
                </div>
            </div>

        </section>

        <div class="py-10">
        <a href="{{route('achievement')}}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Achievement</button>
        </a>

        <a href="{{route('activity')}}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Activity</button>
        </a>
        </div>
{{--        <!-- Achievements -->--}}
{{--        <section class="bg-white p-6 rounded-md shadow-md mt-6">--}}
{{--            <h2 class="text-xl font-bold mb-4">Achievements</h2>--}}
{{--            <p class="text-gray-700">No achievements added yet.</p>--}}
{{--            <a href="{{route('achievement')}}">--}}
{{--            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Achievement</button>--}}
{{--            </a>--}}
{{--        </section>--}}

{{--        <!-- Activity -->--}}
{{--        <section class="bg-white p-6 rounded-md shadow-md mt-6">--}}
{{--            <h2 class="text-xl font-bold mb-4">Activity</h2>--}}
{{--            <p class="text-gray-700">No achievements added yet.</p>--}}
{{--            <a href="{{route('activity')}}">--}}
{{--                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Achievement</button>--}}
{{--            </a>--}}
{{--        </section>--}}

    </div>

</div>
</body>
