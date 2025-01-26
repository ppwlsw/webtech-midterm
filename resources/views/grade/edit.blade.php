@extends('layouts/nav')
@section('topic','แก้ไขสถานะนิสิต')
<body class="pt-20 bg-gray-100 font-sans min-h-screen">
<div class="flex">
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
</div>
</body>
