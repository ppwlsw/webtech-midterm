@extends('layouts.nav')
@section('topic','ประวัตินิสิต')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">

        <div>
            <div class="bg-white rounded-xl shadow-xl border border-gray-200 transition-all duration-200 mb-4">

                <div class="p-6 border-b border-gray-100">
                    <div class="flex justify-between items-start">
                        <div class="space-y-1">
                            <h2 class="text-xl font-semibold text-gray-800">
                                {{ $student->first_name }} {{ $student->last_name }}
                            </h2>
                            <p class="text-gray-600">รหัสนิสิต: {{ $student->student_code }}</p>
                        </div>
                        <div class="flex flex-col items-end">
                            <span class="px-3 py-1 rounded-full text-sm font-medium w-fit
                                {{ $student->student_status === 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $student->student_status === 'active' ? 'กำลังศึกษา' : 'จบการศึกษา' }}
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Student Details -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Academic Information -->
                        <div class="space-y-4">
                            <h3 class="font-semibold text-gray-600 text-sm uppercase tracking-wider">ข้อมูลการศึกษา</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500">ประเภทนิสิต</p>
                                    <p class="font-medium">
                                        {{ $student->student_type === 'special' ? 'ภาคพิเศษ' : 'ภาคปกติ' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">หลักสูตร</p>
                                    <p class="font-medium">{{ $student->curriculum }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">อาจารย์ที่ปรึกษา</p>
                                    <p class="font-medium">{{ $student->advisor_first_name }} {{ $student->advisor_last_name }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Admission Information -->
                        <div class="space-y-4">
                            <h3 class="font-semibold text-gray-600 text-sm uppercase tracking-wider">ข้อมูลการรับเข้า</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500">ช่องทางการรับเข้า</p>
                                    <p class="font-medium">รอบที่ {{ $student->admission_channel }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">ปีที่เข้าศึกษา</p>
                                    <p class="font-medium">{{ $student->admission_year }}</p>
                                </div>
                                @if($student->student_status !== 'active')
                                    <div>
                                        <p class="text-sm text-gray-500">ปีที่จบการศึกษา</p>
                                        <p class="font-medium">{{ $student->completion_year }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Contact Information -->
                        <div class="space-y-4">
                            <h3 class="font-semibold text-gray-600 text-sm uppercase tracking-wider">ข้อมูลการติดต่อ</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500">ที่อยู่</p>
                                    <p class="font-medium">{{ $student->contact_info }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">เบอร์โทรศัพท์</p>
                                    <p class="font-medium">{{ $student->telephone_num }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 text-sm text-gray-500 rounded-lg">
                    <div class="flex justify-between">
                        <span>สร้างเมื่อ: {{ \Carbon\Carbon::parse($student->created_at)->format('d/m/Y H:i') }}</span>
                        <span>อัปเดตล่าสุด: {{ \Carbon\Carbon::parse($student->updated_at)->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="py-10 flex flex-row w-3/12 gap-12">
            <a href="{{route('achievement')}}">
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 whitespace-nowrap">
                    Achievement
                </button>
            </a>

            <a href="{{route('activity')}}">
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 whitespace-nowrap">
                    Activity
                </button>
            </a>

            <!-- Student Card Header -->
            @if($student->student_status == 'active')
                <a href="{{ route('students.edit', $student) }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 whitespace-nowrap">
                    แก้ไขข้อมูล
                </a>
            @endif
        </div>
    </div>

</div>
</body>
