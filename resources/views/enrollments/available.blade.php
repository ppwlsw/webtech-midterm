@extends('layouts.nav')
@section('topic', 'ลงทะเบียน')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white flex flex-col justify-center items-center">
        <div>
            @extends('layouts/sidebar')
        </div>
        <div class="ml-56 mt-20 w-9/12">
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



                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:border-blue-300 transition-all duration-200 mb-4">
                        <!-- Student Card Header -->
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex justify-between items-start">
                                <div class="space-y-1">
                                    <h2 class="text-xl font-semibold text-gray-800">
                                        {{ $course->course_name }}
                                    </h2>
                                </div>



                            </div>
                        </div>

                        <!-- Student Details -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <!-- Academic Information -->
                                <div class="space-y-4">
                                    <div class="space-y-3">
                                        <div>
                                            <p class="text-sm text-gray-500">รหัสวิชา</p>
                                            <p class="font-medium">
                                                {{ $course->course_code}}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">เครดิต</p>
                                            <p class="font-medium">{{ $course->credit }}</p>

                                        </div>

                                    </div>
                                </div>

                                <!-- Admission Information -->
                                <div class="space-y-4">
                                    <div class="space-y-3">
                                        <div>
                                            <p class="text-sm text-gray-500">หมวดหมู่</p>
                                            <p class="font-medium"> {{ $course->course_category }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">หลักสูตร</p>
                                            <p class="font-medium">{{ $course->course_curriculum }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 text-sm text-gray-500 rounded-lg">
                            <div class="flex justify-between items-center">
                                @if($course->prerequisite_course)
                                    <span>Prerequisite : {{ $course->prerequisite_course}} </span>
                                    <form action="{{ route('courses.enroll') }}" method="POST" class="mb-0 w-full flex justify-end items-center">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <input type="hidden" name="semester" value="{{ 3.5 }}">
                                        <button type="submit" class="flex bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                            Enroll
                                        </button>
                                    </form>
                                    @else
                                    <p>Prerequisite : - </p>
                                    <form action="{{ route('courses.enroll') }}" method="POST" class="mb-0 w-full flex justify-end items-center">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <input type="hidden" name="semester" value="{{ 3.5 }}">
                                        <button type="submit" class="flex bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                            Enroll
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </div>

                    </div>

            @empty
                <div class="col-span-3 text-center py-4">
                    <p class="text-gray-600">No courses available for enrollment.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
