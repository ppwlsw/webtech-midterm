@extends('layouts.nav')
@section('topic', 'ลงทะเบียน')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white flex flex-col justify-center items-center">
        <div>
            @extends('layouts/sidebar')
        </div>
        <div class="ml-2 mt-20 w-9/12">
            <!-- Search Section -->
            <div class="mb-6 w-full">
                <form action="{{ route('courses.search') }}" method="GET" class="flex">
                    <input
                        type="text"
                        name="course_code"
                        placeholder="ค้นหาด้วยรหัสวิชา"
                        class="w-3/4 flex-grow px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-r-lg hover:bg-blue-600 transition"
                    >
                        Search
                    </button>
                </form>
            </div>

            <h1 class="text-2xl font-bold mb-4">Available Courses</h1>

            @forelse($availableCourses as $course)
                <div class="w-full border rounded-lg p-6 shadow-md mb-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $course->course_name }}</h2>
                    <p class="text-gray-600 mb-2">Code: {{ $course->course_code }}</p>
                    <p class="text-gray-600 mb-2">Credits: {{ $course->credit }}</p>
                    <p class="text-gray-600 mb-2">Category: {{ $course->course_category }}</p>
                    <p class="text-gray-600">Curriculum: {{ $course->course_curriculum }}</p>

                    @if($course->prerequisite_course)
                        <p class="text-sm text-yellow-600 mb-2">
                            Prerequisite: {{ $course->prerequisite_course }}
                        </p>
                    @endif

                    <form action="{{ route('courses.enroll') }}" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="semester" value="{{ 1.5 }}">
                        <input type="hidden" name="academic_year" value="{{3}}">
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                            Enroll
                        </button>
                    </form>
                </div>
            @empty
                <div class="col-span-3 text-center py-4">
                    <p class="text-gray-600">No courses available for enrollment.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
