@extends('layouts/nav')
@section('topic','ตรวจสอบผลการเรียน')
@props(['data', 'coursesData'])



@php
    $gradePoints = [
        'A' => 4.0,
        'B+' => 3.5,
        'B' => 3.0,
        'C+' => 2.5,
        'C' => 2.0,
        'D+' => 1.5,
        'D' => 1.0,
        'F' => 0.0
    ];



    $totalPoints = 0;
    $totalCredits = 0;

    foreach ($coursesData as $course) {
        if (isset($course['course_grade']) && isset($course['credit'])) {
            $totalPoints += ($gradePoints[$course['course_grade']] ?? 0) * $course['credit'];
            $totalCredits += $course['credit'];
        }
    }

    $gpa = $totalCredits > 0 ? round($totalPoints / $totalCredits, 2) : 0.00;
@endphp







<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Main -->
    @can('studentView', \App\Models\User::class)
        <!-- Sidebar -->
        <div class="w-2/12 bg-gray-100 p-4">
            @extends('layouts/sidebar')
        </div>
        <div class="flex-1 p-6">

            <!-- Header -->
            <div class="w-full flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">ตรวจสอบผลการเรียน</h1>
            </div>

            <div class= "bg-white shadow-lg rounded-lg p-6 mb-8 hover:shadow-xl transition-shadow duration-300">

                <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                    <div class="flex flex-col space-y-2 md:mx-8">
                        <div class="text-gray-600 text-sm font-medium tracking-wider">
                            รหัสนักศึกษา
                        </div>
                        <div class="text-gray-800 text-lg font-semibold tracking-wide">
                            {{ $data->student_code }}
                        </div>
                        <div class="text-2xl font-bold text-gray-900">
                            {{ $data->first_name . " " . $data->last_name }}
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 md:mx-8">
                        <div class="flex flex-col items-end">
                            <div class="text-gray-600 font-medium mb-1">
                                เกรดเฉลี่ยสะสม
                            </div>
                            <div class="text-xl font-bold text-blue-600">
                                {{ number_format($gpa, 2) }}
                            </div>
                        </div>

                        <div class="flex flex-col items-end">
                            <div class="text-gray-600 font-medium mb-1">
                                หน่วยกิตสะสม
                            </div>
                            <div class="text-xl font-bold text-green-600">
                                {{ $totalCredits }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="w-full flex justify-between items-start">
                <div class="bg-white p-6 rounded-xl shadow-lg w-full">
                    <div class="flex items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800">วิชาที่ลงทะเบียน</h2>
                        <span class="ml-4 px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">{{ count($coursesData) }} วิชา</span>
                    </div>

                    <div class="space-y-4 w-full">
                        @foreach($coursesData as $course)
                            @php
                                $courseNameEn = json_encode($course->course_name);
                                $courseNameDe = json_decode($courseNameEn, true);
                                $courseNameArr = explode(',', $courseNameDe);
                                $courseThai = $courseNameArr[0];
                                $courseEng = $courseNameArr[1];
                            @endphp
                            <div class="group w-full bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition-all duration-300">
                                <div class="w-full flex flex-col md:flex-row items-start md:items-center justify-between p-4 md:p-6">
                                    <div class="mb-3 md:mb-0 md:w-1/6">
                                        <p class="text-sm text-gray-500 mb-1">รหัสวิชา</p>
                                        <p class="font-semibold text-gray-800">{{ $course->course_code }}</p>
                                    </div>

                                    <div class="mb-3 md:mb-0 md:w-2/5">
                                        <p class="text-sm text-gray-500 mb-1">ชื่อวิชา</p>
                                        <p class="font-medium text-gray-800">{{ $courseThai }}</p>
                                        <p class="text-sm text-gray-600">{{ $courseEng }}</p>
                                    </div>

                                    <div class="mb-3 md:mb-0 md:w-1/6 text-center">
                                        <p class="text-sm text-gray-500 mb-1">หน่วยกิต</p>
                                        <p class="font-semibold text-gray-800">{{ $course->credit }}</p>
                                    </div>

                                    <div class="md:w-1/6 text-center">
                                        <p class="text-sm text-gray-500 mb-1">เกรด</p>
                                        <span class="inline-block px-4 py-1 rounded-full font-semibold
                            @if($course->course_grade === 'A' || $course->course_grade === 'B+' || $course->course_grade === 'B')
                                bg-green-100 text-green-800
                            @elseif($course->course_grade === 'C+' || $course->course_grade === 'C')
                                bg-yellow-100 text-yellow-800
                            @else
                                bg-red-100 text-red-800
                            @endif
                        ">
                            {{ $course->course_grade }}
                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    @endcan


    {{--  TEACHER/DEPARTMENT SECTION  --}}
    @can('teacherView',\App\Models\User::class)
        <!-- Sidebar -->
        <div class="w-2/12 bg-gray-100 p-4">
            @extends('layouts/sidebar-staff')
        </div>
        <!-- Main -->
        <div class="flex-1 p-6">
            <form method="GET" action="{{ route('grade') }}">
                <!-- Search Bar -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="course-code-input" class="font-semibold text-gray-700">ค้นหาด้วยรหัสวิชา (หลายวิชาได้)</label>
                        <input id="course-code-input" name="course_code" type="text"
                               value="{{ request('course_code') }}"
                               placeholder="ค้นหาด้วยรหัสวิชา"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label for="student-code-input" class="font-semibold text-gray-700">กรอกรหัสนิสิต</label>
                        <input id="student-code-input" name="student_code" type="text"
                               value="{{ request('student_code') }}"
                               placeholder="ค้นหาด้วยรหัสนิสิต"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400">
                    </div>
                </div>


                <div class="bg-white shadow-lg p-6 rounded-lg border border-gray-200">
                    <p class="font-bold text-lg mb-4 text-gray-700"> ค้นหาด้วย : </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="course-curriculum" class="block text-gray-600">หลักสูตร</label>
                            <select name="course_curriculum" class="w-full border-gray-300 rounded-lg shadow-sm">
                                <option value="">เลือก</option>
                                <option value="2560" {{ request('course_curriculum') == '2560' ? 'selected' : '' }}> 2560 </option>
                                <option value="2564" {{ request('course_curriculum') == '2564' ? 'selected' : '' }}> 2564 </option>
                                <option value="2565" {{ request('course_curriculum') == '2565' ? 'selected' : '' }}> 2565 </option>

                            </select>
                        </div>
                        <div>
                            <label for="student-type" class="block text-gray-600">ภาคการศึกษา</label>
                            <select name="student_type" class="w-full border-gray-300 rounded-lg shadow-sm">
                                <option value="">เลือก</option>
                                <option value="regular" {{ request('student_type') == 'regular' ? 'selected' : '' }}> ปกติ </option>
                                <option value="special" {{ request('student_type') == 'special' ? 'selected' : '' }}> พิเศษ </option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition-all">
                        ค้นหา
                    </button>
                </div>

            </form>

            <!-- List -->
            <div class="space-y-4">
                <!-- List Item -->
                @if (isset($data['message']))
                    <div class="text-red-500">{{ $data['message'] }}</div>
                @elseif (!isset($data))
                    <div class="w-screen h-screen text-center text-2xl"> DATA NOT FOUND </div>
                @else
                    @foreach($data as $listItem)
                        <div class="p-2 rounded-lg flex flex-col justify-between items-start gap-3">
                            <x-course-card
                                :listItem="$listItem"
                                :courses="$listItem->courses ?? []"
                            />
                        </div>
                    @endforeach
                @endif

            </div>

        </div>

    @endcan






</div>
</body>
