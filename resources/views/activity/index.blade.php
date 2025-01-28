@extends('layouts.nav')
@section('topic', 'ประวัติการเข้าร่วมกิจกรรม')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">

        <a href="{{ route('students.show', ['student' => auth()->user()->student]) }}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</button>
        </a>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold pl-6 ml-3">ประวัติการเข้าร่วมกิจกรรม</h1>
        </div>

        <!-- Achievements List -->
        <div class="space-y-4">
            <div class="bg-gray-100 p-4 rounded-2xl">

                @if ($activities->isEmpty())
                    <p class="text-gray-500">ยังไม่มีการเข้าร่วมกิจกรรม</p>
                @else
                    <div class="space-y-4">
                        @foreach ($activities as $activity)
                            <!-- Activity Details -->
                            <div class="bg-white rounded-2xl p-2 shadow-lg hover:shadow-xl transition duration-300 ease-in-out">
                                <div class="bg-white p-6 rounded-2xl space-y-6 pl">

                                    <!-- Activity Info -->
                                    <div class="flex justify-between text-md text-gray-700 font-medium pb-4 border-b border-gray-200">
                                        <h1 class="text-2xl font-bold text-gray-800">{{ $activity->activity_name }}</h1>
                                        <div class="flex items-center space-x-2 text-sm text-gray-400">
                                            เข้าร่วมเมื่อ: {{ \Carbon\Carbon::parse($activity->pivot->time_stamp)->format('d-m-Y H:i') }}
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                        <div class="space-y-4">
                                            <h3 class="font-bold text-black-400 uppercase tracking-wider">ข้อมูลการเข้าร่วม</h3>
                                            <div class="space-y-3">
                                                <div>
                                                    <p class="text-m text-gray-500 mb-3">ประเภทประกาศ</p>
                                                    <span class="px-3 py-1 rounded-full text-m font-medium w-fit bg-green-100 text-green-700">{{ $activity->activity_type }}</span>
                                                </div>
                                                <div>
                                                    <p class="text-m text-gray-500 mb-3">เงื่อนไขการเข้าร่วม</p>
                                                    @if ($activity->condition)
                                                        <span class="px-3 py-1 rounded-full text-m font-medium w-fit bg-green-100 text-green-700">
                                                            {{ $activity->condition }}
                                                        </span>
                                                    @else
                                                        <span class="text-m font-medium text-gray-500">-</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p class="text-m text-gray-500 mb-3">จำนวนผู้เข้าร่วมที่เปิดรับ</p>
                                                    <span>{{ $activity->max_participants ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Registration Time -->
                                        <div class="space-y-4">
                                            <h3 class="font-bold text-black-400 uppercase tracking-wider">เวลาการสมัคร</h3>
                                            <div class="space-y-3">
                                                <div>
                                                    <p class="text-m text-gray-500 mb-3">เวลาเริ่มต้นการรับสมัคร</p>
                                                    <span>{{ \Carbon\Carbon::parse($activity->join_start_datetime)->format('d-m-Y H:i') }}</span>
                                                </div>
                                                <div>
                                                    <p class="text-m text-gray-500 mb-3">เวลาสิ้นสุดการรับสมัคร</p>
                                                    <span>{{ \Carbon\Carbon::parse($activity->join_end_datetime)->format('d-m-Y H:i') }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Activity Time -->
                                        <div class="space-y-4">
                                            <h3 class="font-bold text-black-400 uppercase tracking-wider">เวลากิจกรรม</h3>
                                            <div class="space-y-3">
                                                <div>
                                                    <p class="text-m text-gray-500 mb-3">เวลาเริ่มต้นของกิจกรรม</p>
                                                    <span>{{ \Carbon\Carbon::parse($activity->start_datetime)->format('d-m-Y H:i') }}</span>
                                                </div>
                                                <div>
                                                    <p class="text-m text-gray-500 mb-3">เวลาสิ้นสุดของกิจกรรม</p>
                                                    <span>{{ \Carbon\Carbon::parse($activity->end_datetime)->format('d-m-Y H:i') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Details Section -->
                                    <div class="space-y-4">
                                        <h3 class="font-bold text-black-400 uppercase tracking-wider">รายละเอียด</h3>
                                        <div class="space-y-3">
                                            <span>{{ $activity->activity_detail }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
