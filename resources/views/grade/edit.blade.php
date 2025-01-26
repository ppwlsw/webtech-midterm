@extends('layouts/nav')
@section('topic','แก้ไขสถานะนิสิต')
<body class="pt-20 bg-gray-100 font-sans min-h-screen">
<div class="flex justify-center"
    @can('teacherView',\App\Models\User::class)
        <div class="w-64 bg-white shadow-lg">
            @extends('layouts/sidebar')
        </div>

        <div class="flex-1 p-8">
            <div class="max-w-4xl mx-auto">
                <div class="mb-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">แก้ไขสถานะนิสิต</h1>
                            <div class="flex items-center space-x-2 mt-2">
                                <span class="text-gray-600 font-medium">รหัสนิสิต:</span>
                                <span class="text-gray-800">{{ $student->student_code }}</span>
                            </div>
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

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <form method="POST" action="{{ route('students.update', $student->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{date("Y")}}" name="completion_year">

                        <!-- Student Information (Read-only) -->
                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">ชื่อ-นามสกุล</label>
                                <p class="mt-1 p-2 rounded">{{ $student->first_name }} {{ $student->last_name }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">ประเภทนิสิต</label>
                                <p class="mt-1 p-2 rounded">
                                    {{ $student->student_type === 'regular' ? 'ภาคปกติ' : 'ภาคพิเศษ' }}
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">ปีที่เข้าศึกษา</label>
                                <p class="mt-1 p-2 rounded">{{ $student->admission_year }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">ปีที่จบการศึกษา</label>
                                <p class="mt-1 p-2 rounded">{{ $student->completion_year ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">เบอร์โทรศัพท์</label>
                                <p class="mt-1 p-2 rounded">{{ $student->telephone_num }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">หลักสูตร</label>
                                <p class="mt-1 p-2 rounded">{{ $student->curriculum }}</p>
                            </div>
                        </div>

                        <!-- Editable Status -->
                        <div class="space-y-2 border-t pt-6">

                            @if($student->student_status === 'active')
                            <label for="student_status" class="block text-sm font-medium text-gray-700">สถานะ</label>
                            <select id="student_status"
                                    name="student_status"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                {{ $student->student_status === 'inactive' ? 'disabled' : '' }}>
                                <option value="active" {{ old('student_status', $student->student_status) === 'active' ? 'selected' : '' }}>
                                    กำลังศึกษา
                                </option>
                                <option value="inactive" {{ old('student_status', $student->student_status) === 'inactive' ? 'selected' : '' }}>
                                    จบการศึกษา
                                </option>

                            </select>

                            <!-- Form Actions -->
                            <div class="flex justify-end space-x-4 mt-6">
                                <button type="button"
                                        onclick="window.history.back()"
                                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                                    ยกเลิก
                                </button>
                                <button type="submit"
                                        class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
                                    {{ $student->student_status === 'inactive' ? 'disabled' : '' }}>
                                    บันทึก
                                </button>
                            </div>
                            @endif
                        </div>

                        <!-- Alumni information -->
                        @if($student->student_status === 'inactive')
                        <div class="space-y-2 ">

                            <div class="gap-6">
                                <div>
                                    <label class=" text-sm font-medium text-gray-700">ผลงาน</label>
                                    <p class="mt-1 p-2 rounded pb-6">{{ $student->contribution}}</p>
                                </div>
                                <div>
                                    <label class=" text-sm font-medium text-gray-700">ที่ทำงานปัจจุบัน</label>
                                    <p class="mt-1 p-2 rounded">{{ $student->workplace}}</p>
                                </div>
                            </div>


                        </div>
                        @endif


                    </form>
                </div>
            </div>
        </div>

    @endcan

@can('studentView', \App\Models\User::class)
    <div class="min-h-screen flex bg-gradient-to-r from-blue-50 to-blue-100 py-8">
        <div class="w-full flex justify-center px-4">
            <!-- Sidebar -->
            <div>
                @extends('layouts/sidebar')
            </div>

            <!-- Main Content -->
            <form method="POST" action="{{ route('students.update', $student->id) }}" class="w-2/4 bg-white rounded-2xl shadow-lg border border-gray-300 p-8">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                        <ul class="list-disc list-inside text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2 class="text-3xl font-bold text-gray-800 mb-8">แก้ไขข้อมูลนิสิต</h2>

                <!-- Personal Information -->
                <div class="flex flex-col gap-8">
                    <div class="relative">
                        <label class="block text-lg font-semibold text-gray-800 mb-2">รหัสนิสิต</label>
                        <div class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $student->student_code }}</div>
                        <i class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 fas fa-id-badge"></i>
                    </div>
                    <div class="relative">
                        <label class="block text-lg font-semibold text-gray-800 mb-2">ชื่อ</label>
                        <input type="text" name="first_name" value="{{ $student->first_name }}" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <i class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 fas fa-user"></i>
                    </div>
                    <div class="relative">
                        <label class="block text-lg font-semibold text-gray-800 mb-2">นามสกุล</label>
                        <input type="text" name="last_name" value="{{ $student->last_name }}" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <i class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 fas fa-user"></i>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="flex flex-col gap-8 mt-8">
                    <div class="relative">
                        <label class="block text-lg font-semibold text-gray-800 mb-2">เบอร์โทรศัพท์</label>
                        <input type="text" name="telephone_num" value="{{ $student->telephone_num }}" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <i class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 fas fa-phone"></i>
                    </div>
                    <div>
                        <label class="block text-lg font-semibold text-gray-800 mb-2">ที่อยู่</label>
                        <textarea name="contact_info" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $student->contact_info }}</textarea>
                    </div>
                </div>

                <!-- Alumni Information (if inactive) -->
                @if($student->student_status === 'inactive')
                    <div class="flex flex-col gap-8 mt-8">
                        <div class="relative">
                            <label class="block text-lg font-semibold text-gray-800 mb-2">ที่ทำงานปัจจุบัน</label>
                            <input type="text" name="workplace" value="{{ $student->workplace }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-lg font-semibold text-gray-800 mb-2">ผลงาน</label>
                            <textarea name="contribution" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $student->contribution }}</textarea>
                        </div>
                    </div>
                @endif

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 mt-8">
                    <a href="{{route('students.show', ['student' => auth()->user()->student])}}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-all duration-300 shadow-md">
                        ยกเลิก
                    </a>
                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-300 shadow-md">
                        บันทึก
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endcan

    </div>
</body>
