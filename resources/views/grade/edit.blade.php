@extends('layouts/nav')
@section('topic','แก้ไขข้อมูลนิสิต')

<body class="pt-20 bg-gray-100 font-sans min-h-screen">
<div class="flex">
    @can('teacherView',\App\Models\User::class)
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            @extends('layouts/sidebar')
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="mb-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">แก้ไขข้อมูลนิสิต</h1>
                            <p class="text-gray-600">แก้ไขข้อมูลของ {{ $student->first_name }} {{ $student->last_name }}</p>
                        </div>

                    </div>
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

                <!-- Edit Form -->
                <form method="POST" action="{{ route('students.update', $student->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <!-- Personal Information -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900">ข้อมูลส่วนตัว</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">ชื่อ</label>
                                    <input type="text"
                                           id="first_name"
                                           name="first_name"
                                           value="{{ old('first_name', $student->first_name) }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="space-y-2">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">นามสกุล</label>
                                    <input type="text"
                                           id="last_name"
                                           name="last_name"
                                           value="{{ old('last_name', $student->last_name) }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Academic Information -->
                        <div class="space-y-6 mt-8">
                            <h3 class="text-lg font-semibold text-gray-900">ข้อมูลการศึกษา</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="student_type" class="block text-sm font-medium text-gray-700">ประเภทนิสิต</label>
                                    <select id="student_type"
                                            name="student_type"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="regular" {{ old('student_type', $student->student_type) === 'regular' ? 'selected' : '' }}>ภาคปกติ</option>
                                        <option value="special" {{ old('student_type', $student->student_type) === 'special' ? 'selected' : '' }}>ภาคพิเศษ</option>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label for="student_status" class="block text-sm font-medium text-gray-700">สถานะ</label>
                                    <select id="student_status"
                                            name="student_status"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="active" {{ old('student_status', $student->student_status) === 'active' ? 'selected' : '' }}>กำลังศึกษา</option>
                                        <option value="inactive" {{ old('student_status', $student->student_status) === 'inactive' ? 'selected' : '' }}>จบการศึกษา</option>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label for="curriculum" class="block text-sm font-medium text-gray-700">หลักสูตร</label>
                                    <input type="text"
                                           id="curriculum"
                                           name="curriculum"
                                           value="{{ old('curriculum', $student->curriculum) }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="space-y-2">
                                    <label for="completion_year" class="block text-sm font-medium text-gray-700">ปีที่จบการศึกษา</label>
                                    <input type="text"
                                           id="completion_year"
                                           name="completion_year"
                                           value="{{ old('completion_year', $student->completion_year) }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="space-y-6 mt-8">
                            <h3 class="text-lg font-semibold text-gray-900">ข้อมูลการติดต่อ</h3>
                            <div class="grid grid-cols-1 gap-6">
                                <div class="space-y-2">
                                    <label for="contact_info" class="block text-sm font-medium text-gray-700">ที่อยู่</label>
                                    <textarea id="contact_info"
                                              name="contact_info"
                                              rows="3"
                                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('contact_info', $student->contact_info) }}</textarea>
                                </div>

                                <div class="space-y-2">
                                    <label for="telephone_num" class="block text-sm font-medium text-gray-700">เบอร์โทรศัพท์</label>
                                    <input type="text"
                                           id="telephone_num"
                                           name="telephone_num"
                                           value="{{ old('telephone_num', $student->telephone_num) }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-4">
                        <button type="button"
                                onclick="window.history.back()"
                                class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            ยกเลิก
                        </button>
                        <button type="submit"
                                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            บันทึก
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endcan
</div>
</body>
