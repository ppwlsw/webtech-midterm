@extends('layouts.nav')
@section('topic', 'รายวิชาที่ลงทะเบียน')



<div class="pt-20 w-full bg-gray-100 ">
    <div class="flex h-screen ml-20">
        <div class="w-2/12 bg-gray-100 p-4">
            @extends('layouts/sidebar')
        </div>
        <div class="container mx-auto px-4 py-6">

            <div class="p-4 border-b flex justify-between items-center">
                <h2 class="text-xl font-bold">
                    {{ $student->first_name }} {{ $student->last_name }}
                    <span class="text-sm text-gray-600">({{ $student->student_code }})</span>
                </h2>
                <a href="{{ route('grades.index') }}" class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600">
                    กลับไปยังรายชื่อนิสิต
                </a>
            </div>

            <div class="bg-white shadow-md rounded-lg">


                @forelse($enrolledCourses as $category => $courses)

                <div class="flex flex-col">
                    <div class="m-5 border-b-[1px] border-black ">
                        <h3 class="text-lg font-semibold"> {{ $category }} </h3>
                    </div>

                    <div class=" p-4 flex flex-row justify-around items-center mb-2 font-bold bg-gray-100">
                        <div class="flex flex-col w-full items-center">
                            รหัสวิชา
                        </div>
                        <div class="flex flex-col w-full items-center">
                            ชื่อวิชา
                        </div>
                        <div class="flex flex-col items-center w-full">
                            <div>
                                เครติด
                            </div>
                        </div>
                        <div class="flex flex-col items-center w-full">
                            <div>
                                เกรด
                            </div>
                        </div>
                        <div class="w-full flex flex-col items-center">

                        </div>
                    </div>


                @foreach($courses as $course)
                        @php
                            $courseName = explode(',' ,$course->course_name);
                            $course_th = $courseName[0] ?? "" ;
                            $course_en = $courseName[1] ?? "" ;
                        @endphp
                        <div class=" p-4 flex flex-row justify-around items-center  mb-2">
                            <div class="flex flex-col text-lg font-bold w-full items-center">
                                {{ $course->course_code }}
                            </div>
                            <div class="flex flex-col w-full">
                                <div class="text-lg font-medium">{{$course_th}}</div>
                                <div class="text-gray-500 text-sm line-clamp-2">{{$course_en}}</div>
                            </div>
                            <div class="flex flex-col items-center w-full">

                                <div>
                                    {{$course->credit}}
                                </div>
                            </div>
                            <div class="flex flex-col items-center w-full">

                                <div>
                                    {{$course->course_grade ?? 'ยังไม่มีเกรด'}}
                                </div>
                            </div>
                            <div class="w-full flex flex-col items-center">
                                <a href="{{route('grades.edit', ['resultId' => $course->result_id])}}"
                                   class="w-fit p-4 bg-green-500 text-white font-bold hover:bg-green-400 transform duration-100"
                                >
                                    แก้ไขเกรด
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @empty
                    <div class="p-4 text-center text-gray-500">
                        ไม่มีรายวิชาที่ลงทะเบียน
                    </div>
                </div>






                @endforelse
            </div>
        </div>

    </div>

</div>
