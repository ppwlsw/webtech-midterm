@extends('layouts.nav')
@section('topic','ข่าวสารนิสิต')
@props(['activity'])
<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    //role
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">

        <a href="{{route('announcement')}}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">กลับ</button>
        </a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded-2xl mb-6 pl-6">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded-md">
                {{ session('error') }}
            </div>
        @endif
        @if (session('info'))
            <div class="bg-blue-100 text-blue-700 p-2 rounded-md">
                {{ session('info') }}
            </div>
        @endif

        <!-- Details -->
        <section class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <div class="flex space-x-5">
                    <h1 class="text-2xl font-bold text-gray-800">{{ $activity->activity_name }}</h1>

                    @if ($activity->join_start_datetime && $activity->join_end_datetime)
                        <span class="px-3 py-1 rounded-full text-m font-medium w-fit
                            @if (now()->isBefore($activity->join_start_datetime))
                                bg-yellow-100 text-yellow-700
                            @elseif (now()->isAfter($activity->join_end_datetime))
                                bg-red-100 text-red-700
                            @elseif ($activity->students->count() >= $activity->max_participants && $activity->max_participants != 0)
                                bg-orange-100 text-orange-700
                            @else
                                bg-green-100 text-green-700
                            @endif
                        ">
                            @if ($activity->students->count() >= $activity->max_participants && $activity->max_participants != 0)
                                เข้าร่วมเต็มแล้ว
                            @elseif (now()->isBefore($activity->join_start_datetime))
                                ยังไม่เปิดรับสมัคร
                            @elseif (now()->isAfter($activity->join_end_datetime))
                                หมดเขตร่วมกิจกรรม
                            @else
                                สามารถเข้าร่วมได้
                            @endif
                        </span>
                    @endif

                    @if ($activity->start_datetime && $activity->end_datetime)
                        <span class="px-3 py-1 rounded-full text-m font-medium w-fit
                            @if (now()->isBefore($activity->start_datetime))
                                bg-yellow-100 text-yellow-700
                            @elseif (now()->between($activity->start_datetime, $activity->end_datetime))
                                bg-blue-100 text-blue-700
                            @else
                                bg-gray-200 text-gray-600
                            @endif
                        ">
                            @if (now()->isBefore($activity->start_datetime))
                                กิจกรรมยังไม่เริ่มต้น
                            @elseif (now()->between($activity->start_datetime, $activity->end_datetime))
                                กิจกรรมกำลังดำเนินอยู่
                            @else
                                กิจกรรมสิ้นสุดแล้ว
                            @endif
                        </span>

                    @endif
                </div>

                <div class="flex space-x-3">
                    @can('studentView', \App\Models\User::class)
                        @if($activity->max_participants)
                            @php
                                // Check if the student is already registered for this activity
                                $isRegistered = $activity->students->contains(auth()->user()->id);
                            @endphp

                            @if ($isRegistered)
                                <!-- Button for already joined students -->
                                <button class="flex items-center space-x-2 bg-gray-300 text-gray-700 px-4 py-2 rounded-md cursor-not-allowed">
                                    เข้าร่วมแล้ว
                                </button>
                            @else
                                <!-- Button for students who haven't joined yet -->
                                <button
                                    onclick="confirmJoin({{ $activity->id }})"
                                    class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600
                                    @if (now()->isBefore($activity->join_start_datetime))
                                        hidden
                                    @elseif (now()->isAfter($activity->join_end_datetime))
                                        hidden
                                    @elseif (now()->isAfter($activity->end_datetime))
                                        disabled opacity-50
                                    @elseif (now()->between($activity->join_start_datetime, $activity->join_end_datetime))

                                    @else
                                        disabled opacity-50
                                    @endif
                                ">
                                    เข้าร่วม
                                </button>
                            @endif
                        @endif
                    @endcan

                    @can('update', \App\Models\User::class)
                        <form action="{{ route('announcement.edit', ['activity' => $activity]) }}" method="GET">
                            @csrf
                            <button type="submit" class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                </svg>
                                <span>แก้ไขรายละเอียด</span>
                            </button>
                        </form>
                    @endcan
                </div>
            </div>

            <!-- Detail -->
            <div class="bg-white rounded-2xl mb-8 shadow-lg hover:shadow-xl transition duration-300 ease-in-out">
                <div class="bg-white p-4 rounded-2xl pl-6 pr-10 pt-5 space-y-4">

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Activity Info -->
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
                        <div class="pt-5 space-y-4">
                            <h3 class="font-bold text-black-400 uppercase tracking-wider">รายละเอียด</h3>
                            <div class="space-y-3">
                                <span>{{ $activity->activity_detail }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Created/Updated Section -->
                <div class="bg-white px-6 py-4 text-sm text-gray-500 rounded-b-2xl border-t">
                    <div class="flex justify-between">
                        <span>สร้างเมื่อ: {{ \Carbon\Carbon::parse($activity->created_at)->format('d-m-Y H:i') }}</span>
                        <span>อัปเดตล่าสุด: {{ \Carbon\Carbon::parse($activity->updated_at)->format('d-m-Y H:i') }}</span>
                    </div>
                </div>
            </div>


            <!-- List of Students Joined -->
            @if($activity->max_participants)
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-xl font-bold text-gray-800">รายชื่อนิสิตที่เข้าร่วม</h1>
                    <p>
                        <button class="bg-gray-300 text-gray-700 px-3 py-1 rounded-md ">
                            {{ $activity->students->count() }}
                        </button>
                        <span> / </span>
                        <button class="bg-gray-300 text-gray-700 px-3 py-1 rounded-md ">
                            {{ $activity->max_participants ?? '-' }}
                        </button>
                    </p>

                </div>

                <div class="bg-gray-100 p-4 rounded-md">
                    @if($activity->students->isNotEmpty())
                        <ul class="space-y-2">
                            @foreach($activity->students as $student)
                                <li class="bg-white p-4 pl-6 rounded-xl shadow-sm hover:shadow-lg transition duration-300 ease-in-out flex justify-between items-center">
                                    <div class="flex space-x-4">
                                        <span>{{ $student->student_code }}</span>
                                        <span>{{ $student->first_name }}</span>
                                        <span>{{ $student->last_name }}</span>
                                    </div>

                                    <div class="flex items-center space-x-2 text-sm text-gray-400">
                                        <div>
                                            เข้าร่วมเมื่อ: {{ \Carbon\Carbon::parse($student->pivot->time_stamp)->format('d-m-Y H:i') }}
                                        </div>
                                        <span class="px-3 py-1 rounded-full font-medium
                                            @if ($student->student_type === 'special')
                                                bg-blue-100 text-blue-700
                                            @elseif ($student->student_type === 'regular')
                                                bg-green-100 text-green-700
                                            @endif
                                        ">
                                            @if ($student->student_type === 'special')
                                                ภาคพิเศษ
                                            @elseif ($student->student_type === 'regular')
                                                ภาคปกติ
                                            @endif
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>


                    @else
                        <p class="text-gray-500">ยังไม่มีนิสิตเข้าร่วม</p>
                    @endif
                </div>
            @endif

        </section>
    </div>
</div>
</body>


<script>
    function confirmJoin(activity) {
        if (confirm('คุณต้องการเข้าร่วมกิจกรรมนี้หรือไม่?')) {
            window.location.href = `/announcement/join/${activity}`;
        }
    }
</script>
