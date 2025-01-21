@extends('layouts/nav')
@section('topic','รายละเอียดนิสิต')
@props(['data'])

<body class="pt-20 bg-gray-100 font-sans min-h-screen">
<div class="flex">
    @can('teacherView',\App\Models\User::class)
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            @extends('layouts/sidebar')
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="max-w-6xl mx-auto">
                <!-- Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">รายชื่อนิสิต</h1>
                    <p class="text-gray-600">รายละเอียดข้อมูลนิสิตทั้งหมด</p>
                </div>

                <!-- Student List -->
                <div class="space-y-4">
                    @if (isset($data['message']))
                        <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
                            <p class="text-red-600">{{ $data['message'] }}</p>
                        </div>
                    @elseif (!isset($data))
                        <div class="flex items-center justify-center min-h-[400px]">
                            <div class="text-2xl text-gray-500 font-medium">ไม่พบข้อมูล</div>
                        </div>
                    @else

                        <form method="GET" action="{{ route('students.search') }}" class="space-y-6">
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div class="space-y-2">
                                        <label for="student_code" class="flex items-center text-gray-700 font-medium">
                                            รหัสนิสิต
                                        </label>
                                        <input
                                            type="text"
                                            id="student_code"
                                            name="student_code"
                                            placeholder="ค้นหาด้วยรหัสนิสิต เช่น 621"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ request('student_code') }}"
                                        >
                                    </div>

                                    <div class="space-y-2">
                                        <label for="name" class="flex items-center text-gray-700 font-medium">

                                            ชื่อ-นามสกุล
                                        </label>
                                        <input
                                            type="text"
                                            id="name"
                                            name="name"
                                            placeholder="ค้นหาด้วยชื่อหรือนามสกุล"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ request('name') }}"
                                        >
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <span class="text-gray-700 font-semibold">ตัวกรองขั้นสูง</span>
                                        <span class="ml-2 px-2 py-1 bg-gray-100 rounded-full text-xs text-gray-600">เลือกได้หลายอย่าง</span>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div>
                                            <label class="block text-gray-700 font-medium mb-2">ประเภทนิสิต</label>
                                            <select name="student_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                <option value="">ทั้งหมด</option>
                                                <option value="regular" {{ request('student_type') == 'regular' ? 'selected' : '' }}>ภาคปกติ</option>
                                                <option value="special" {{ request('student_type') == 'special' ? 'selected' : '' }}>ภาคพิเศษ</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-gray-700 font-medium mb-2">สถานะ</label>
                                            <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                <option value="">ทั้งหมด</option>
                                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>กำลังศึกษา</option>
                                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>จบการศึกษา</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-gray-700 font-medium mb-2">หลักสูตร</label>
                                            <input
                                                type="text"
                                                name="curriculum"
                                                placeholder="เช่น 60"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                value="{{ request('curriculum') }}"
                                            >
                                        </div>
                                    </div>


                                </div>

                                <!-- Search Button -->
                                <div class="mt-6 flex justify-end">
                                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center">

                                        ค้นหา
                                    </button>
                                </div>
                            </div>
                        </form>
                        @foreach($data as $listItem)

                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:border-blue-300 transition-all duration-200">
                                <!-- Student Card Header -->
                                <div class="p-6 border-b border-gray-100">
                                    <div class="flex justify-between items-start">
                                        <div class="space-y-1">
                                            <h2 class="text-xl font-semibold text-gray-800">
                                                {{ $listItem->first_name }} {{ $listItem->last_name }}
                                            </h2>
                                            <p class="text-gray-600">รหัสนิสิต: {{ $listItem->student_code }}</p>
                                        </div>

                                        <div class="flex flex-col items-end">
                                            <span class="px-3 py-1 rounded-full text-sm font-medium w-fit
                                                {{ $listItem->student_status === 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                                {{ $listItem->student_status === 'active' ? 'กำลังศึกษา' : 'จบการศึกษา' }}
                                            </span>
                                            <a href="{{ route('students.edit', $listItem->id) }}"
                                               class="text-xs p-2 text-gray-400 hover:text-gray-900">
                                                แก้ไขข้อมูล
                                            </a>
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
                                                        {{ $listItem->student_type === 'special' ? 'ภาคพิเศษ' : 'ภาคปกติ' }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-500">หลักสูตร</p>
                                                    <p class="font-medium">{{ $listItem->curriculum }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Admission Information -->
                                        <div class="space-y-4">
                                            <h3 class="font-semibold text-gray-600 text-sm uppercase tracking-wider">ข้อมูลการรับเข้า</h3>
                                            <div class="space-y-3">
                                                <div>
                                                    <p class="text-sm text-gray-500">ช่องทางการรับเข้า</p>
                                                    <p class="font-medium">รอบที่ {{ $listItem->admission_channel }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-500">ปีที่เข้าศึกษา</p>
                                                    <p class="font-medium">{{ $listItem->admission_year }}</p>
                                                </div>
                                                @if($listItem->student_status !== 'active')
                                                    <div>
                                                        <p class="text-sm text-gray-500">ปีที่จบการศึกษา</p>
                                                        <p class="font-medium">{{ $listItem->completion_year }}</p>
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
                                                    <p class="font-medium">{{ $listItem->contact_info }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-500">เบอร์โทรศัพท์</p>
                                                    <p class="font-medium">{{ $listItem->telephone_num }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 text-sm text-gray-500">
                                    <div class="flex justify-between">
                                        <span>สร้างเมื่อ: {{ \Carbon\Carbon::parse($listItem->created_at)->format('d/m/Y H:i') }}</span>
                                        <span>อัปเดตล่าสุด: {{ \Carbon\Carbon::parse($listItem->updated_at)->format('d/m/Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endcan
</div>
</body>
