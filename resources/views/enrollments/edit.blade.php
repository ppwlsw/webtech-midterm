@extends('layouts.nav')
@section('topic', 'แก้ไขเกรด')
@extends('layouts/sidebar')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded-lg max-w-md mx-auto">
        <div class="p-4 bg-gray-50 border-b">
            <h2 class="text-xl font-bold">แก้ไขเกรด</h2>
        </div>

        <form action="{{ route('grades.update', ['resultId' => $courseResult->id] )}}" method="POST" class="p-6">
            @csrf
            <input type="hidden" name="result_id" value="{{ $courseResult->id }}">
            <input type="hidden" name="student_id" value="{{ $courseResult->student_id }}">
            <div class="mb-4">
                <input type="hidden" name="course_code" value="{{ $courseResult->student_id }}" class="w-full px-3 py-2 border rounded-md" readonly>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">รหัสวิชา</label>
                <input type="text" name="course_code" value="{{ $courseResult->course_code }}" class="w-full px-3 py-2 border rounded-md" readonly>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">ชื่อวิชา</label>
                <input type="text" name="course_name" value="{{ $courseResult->course_name }}" class="w-full px-3 py-2 border rounded-md" readonly>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">เกรด</label>
                <select name="course_grade" class="w-full px-3 py-2 border rounded-md">
                    @php
                        $grades = [null, 4.0, 3.5, 3.0, 2.5, 2.0, 1.5, 1.0, 0.0];
                    @endphp
                    @foreach($grades as $grade)
                            <option value="{{ $grade }}" name="course_grade"
                            {{ $courseResult->course_grade == $grade ? 'selected' : '' }}>
                            {{ $grade === null ? 'ยังไม่มีเกรด' : $grade }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('grades.courses', $courseResult->student_id) }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    ยกเลิก
                </a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    บันทึกเกรด
                </button>
            </div>
        </form>
    </div>
</div>
