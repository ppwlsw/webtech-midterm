@extends('layouts.nav')
@section('topic', 'รายวิชาที่ลงทะเบียน')



<div class="pt-20 w-full bg-gray-100 ">
    <div class="flex h-screen ml-20">
        <div class="w-2/12 bg-gray-100 p-4">
            @extends('layouts/sidebar')
        </div>
        <div class="container mx-auto px-4 py-6">


            <div class="bg-white shadow-md rounded-lg">
                <div class="p-4 bg-gray-50 border-b flex justify-between items-center">
                    <h2 class="text-xl font-bold">
                        {{ $student->first_name }} {{ $student->last_name }}
                        <span class="text-sm text-gray-600">({{ $student->student_code }})</span>
                    </h2>
                    <a href="{{ route('grades.index') }}" class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600">
                        กลับไปยังรายชื่อนิสิต
                    </a>
                </div>

                @forelse($enrolledCourses as $category => $courses)
                    <div class="p-4 border-b">
                        <h3 class="text-lg font-semibold mb-3">{{ $category }}</h3>
                        <table class="w-full">
                            <thead>
                            <tr class="bg-gray-100">
                                <th> id </th>
                                <th class="px-4 py-2 text-center">รหัสวิชา</th>
                                <th class="px-4 py-2 text-center">ชื่อวิชา</th>
                                <th class="px-4 py-2 text-center">หน่วยกิต</th>
                                <th class="px-4 py-2 text-center">เกรด</th>
                                <th class="px-4 py-2 text-center">การดำเนินการ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr class="border-b hover:bg-gray-50">
                                    <td>{{$course->result_id}}</td>
                                    <td class="px-4 py-2 text-center">{{ $course->course_code }}</td>
                                    <td class="px-4 py-2 text-center">{{ $course->course_name }}</td>
                                    <td class="px-4 py-2 text-center">{{ $course->credit }}</td>
                                    <td class="px-4 py-2 text-center">
                                        {{ $course->course_grade ?? 'ยังไม่มีเกรด' }}
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('grades.edit', [$course->result_id]) }}"
                                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                            แก้ไขเกรด
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @empty
                    <div class="p-4 text-center text-gray-500">
                        ไม่มีรายวิชาที่ลงทะเบียน
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>
