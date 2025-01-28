@section('topic','เพิ่มข้อมูลนิสิต')
@extends('layouts/nav')
<body>
<div class="w-2/12 bg-gray-100 p-4">
    @extends('layouts/sidebar')
</div>


<div class="min-h-screen bg-gray-100 pt-20">
    <div class="max-w-4xl mx-auto p-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">กรอกข้อมูลนิสิตใหม่</h1>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <ul class="list-disc list-inside text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('students.store') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            @csrf

            <div class="space-y-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-900">ข้อมูลบัญชี</h3>
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">อีเมล</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">รหัสผ่าน</label>
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="space-y-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-900">ข้อมูลส่วนตัว</h3>
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="student_code" class="block text-sm font-medium text-gray-700">รหัสนิสิต</label>
                        <input type="text" id="student_code" name="student_code" value="{{ old('student_code') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="space-y-2">
                        <label for="student_type" class="block text-sm font-medium text-gray-700">ประเภทนิสิต</label>
                        <select id="student_type" name="student_type" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="regular" {{ old('student_type') === 'regular' ? 'selected' : '' }}>ภาคปกติ</option>
                            <option value="special" {{ old('student_type') === 'special' ? 'selected' : '' }}>ภาคพิเศษ</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">ชื่อ</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="space-y-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">นามสกุล</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="space-y-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-900">ข้อมูลการศึกษา</h3>
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="admission_year" class="block text-sm font-medium text-gray-700">ปีที่เข้าศึกษา</label>
                        <input type="text" id="admission_year" name="admission_year" value="{{ old('admission_year') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="space-y-2">
                        <label for="admission_channel" class="block text-sm font-medium text-gray-700">ช่องทางการรับเข้า</label>
                        <select id="admission_channel" name="admission_channel" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="academic_year" class="block text-sm font-medium text-gray-700">ชั้นปีที่</label>
                        <select id="academic_year" name="semester" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="curriculum" class="block text-sm font-medium text-gray-700">หลักสูตร</label>
                        <select id="curriculum" name="curriculum" required>
                            <option value="65">65</option>
                            <option value="60">60</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-900">ข้อมูลการติดต่อ</h3>
                <div class="grid grid-cols-1 gap-6">
                    <div class="space-y-2">
                        <label for="contact_info" class="block text-sm font-medium text-gray-700">ที่อยู่</label>
                        <textarea id="contact_info" name="contact_info" rows="3" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('contact_info') }}</textarea>
                    </div>
                    <div class="space-y-2">
                        <label for="telephone_num" class="block text-sm font-medium text-gray-700">เบอร์โทรศัพท์</label>
                        <input type="tel" id="telephone_num" name="telephone_num" value="{{ old('telephone_num') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <button type="button" onclick="window.history.back()"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                    ยกเลิก
                </button>
                <button type="submit"
                        class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    บันทึก
                </button>
            </div>
        </form>
    </div>
</div>

</body>

