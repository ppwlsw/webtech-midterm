@extends('layouts.nav')
@section('topic','ข่าวสารนิสิต')
@props(['activities'])
<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
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
        <!-- Announcement -->
        <section class="mb-8">
            <form action="{{ route('announcement.create') }}" method="GET"  class="flex justify-between items-center mb-4">
                @csrf

                <h1 class="text-2xl font-bold text-gray-800">ประชาสัมพันธ์</h1>

                @can('create', \App\Models\User::class)
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        <span>สร้างประกาศใหม่</span>
                    </button>
                @endcan
            </form>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($activities->slice(0, 3) as $activity)
                    <a href="{{ route('announcement.show', ['activity' => $activity]) }}" class="bg-gradient-to-r from-blue-200 to-white-100 p-6 h-72 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out transform hover:shadow-xl">

                        <!-- Activity Name -->
                        <h3 class="text-2xl font-semibold text-gray-700 mb-2">{{ $activity->activity_name }}</h3>

                        <!-- Date and Time -->
                        @if ($activity->start_datetime && $activity->end_datetime)
                            <div class="text-m text-gray-600 mb-3">
                                <div>เริ่มกิจกรรม: {{ \Carbon\Carbon::parse($activity->start_datetime)->format('d-m-Y H:i') }}</div>
                                <div>สิ้นสุดกิจกรรม: {{ \Carbon\Carbon::parse($activity->end_datetime)->format('d-m-Y H:i') }}</div>
                            </div>

                            <!-- Status Label -->
                            <div class="flex items-center space-x-2">
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
                            </div>
                        @endif
                    </a>
                @endforeach
            </div>

        </section>

        <!-- Search Bar -->
        <div class="mb-8">
            <form action="{{ route('announcement') }}" method="GET" class="flex">
                @csrf
                <label for="course_code" class="flex items-center text-gray-700 font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </label>
                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="ค้นหาด้วยชื่อประกาศ / กิจกรรม"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm
                           placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500
                           transition-all duration-200"
                >
                <button
                    type="submit"
                    class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
                >
                    ค้นหา
                </button>
            </form>
        </div>

        <!-- List of Activity -->
        <section>
            <h1 class="text-2xl font-bold mb-4 pb-5">ข่าวสารและกิจกรรม</h1>

            <!-- Filter Buttons -->
            <div class="flex space-x-3 mb-6 pb-3">
                <a href="{{ route('announcement', ['filter' => 'can-join']) }}"
                   class="px-3 py-1 rounded-full text-m font-medium w-fit bg-green-100 text-green-700 hover:bg-green-200
                   {{ request('filter') === 'can-join' ? 'bg-green-200' : '' }}">
                    สามารถเข้าร่วมได้
                </a>

                <a href="{{ route('announcement', ['filter' => 'full']) }}"
                   class="px-3 py-1 rounded-full text-m font-medium w-fit bg-orange-100 text-orange-700 hover:bg-orange-200
                   {{ request('filter') === 'full' ? 'bg-orange-200' : '' }}">
                    เข้าร่วมเต็มแล้ว
                </a>

                <a href="{{ route('announcement', ['filter' => 'cannot-join']) }}"
                   class="px-3 py-1 rounded-full text-m font-medium w-fit bg-red-100 text-red-700 hover:bg-red-200
                   {{ request('filter') === 'cannot-join' ? 'bg-red-200' : '' }}">
                    หมดเขตร่วมกิจกรรม
                </a>

                <a href="{{ route('announcement', ['filter' => 'not-started']) }}"
                   class="px-3 py-1 rounded-full text-m font-medium w-fit bg-yellow-100 text-yellow-700 hover:bg-yellow-200
                   {{ request('filter') === 'not-started' ? 'bg-yellow-200' : '' }}">
                    กิจกรรมยังไม่เริ่มต้น
                </a>

                <a href="{{ route('announcement', ['filter' => 'ongoing']) }}"
                   class="px-3 py-1 rounded-full text-m font-medium w-fit bg-blue-100 text-blue-700 hover:bg-blue-200
                   {{ request('filter') === 'ongoing' ? 'bg-blue-200' : '' }}">
                    กิจกรรมกำลังดำเนินอยู่
                </a>

                <a href="{{ route('announcement', ['filter' => 'ended']) }}"
                   class="px-3 py-1 rounded-full text-m font-medium w-fit bg-gray-200 text-gray-700 hover:bg-gray-300
                   {{ request('filter') === 'ended' ? 'bg-gray-300' : '' }}">
                    กิจกรรมสิ้นสุดแล้ว
                </a>

                <a href="{{ route('announcement') }}"
                   class="px-3 py-1 rounded-full text-m font-medium bg-blue-400 text-white hover:bg-blue-500">
                    ดูทั้งหมด
                </a>
           </div>

            <ul class="space-y-4">
                @foreach($filteredActivities as $activity)
                    <li class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 ease-in-out">
                        <div>
                            <a href="{{ route('announcement.show', ['activity' => $activity]) }}" class="text-xl font-semibold text-gray-800 hover:text-blue-600 mr-4">
                                {{ $activity->activity_name }}
                            </a>
                            @if ($activity->max_participants)
                                <div class="flex flex-col items-end">
                                    <p class="flex items-center space-x-2 text-gray-500">จำนวนผู้เข้าร่วม
                                        <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md ml-3">
                                            {{ $activity->students->count() }}
                                        </button>
                                        <span> / </span>
                                        <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md">
                                            {{ $activity->max_participants ?? '0' }}
                                        </button>
                                    </p>
                                </div>
                            @endif
                        </div>

                        <!-- Display Datetime -->
                    @if ($activity->join_start_datetime && $activity->join_end_datetime)
                        <div class="flex flex-wrap space-x-6 text-gray-600 mb-4">
                            <div class="flex items-center space-x-2">
                                <span class="font-medium">เวลาเริ่มต้นการรับสมัคร:</span>
                                <span class="text-sm">{{ \Carbon\Carbon::parse($activity->join_start_datetime)->format('d-m-Y H:i') }}</span>
                            </div>

                            <div class="flex items-center space-x-2">
                                <span class="font-medium">เวลาสิ้นสุดการรับสมัคร:</span>
                                <span class="text-sm">{{ \Carbon\Carbon::parse($activity->join_end_datetime)->format('d-m-Y H:i') }}</span>
                            </div>
                        </div>
                    @endif

                    @if ($activity->start_datetime && $activity->end_datetime)
                        <div class="flex flex-wrap space-x-6 text-gray-600 mb-4">
                            <div class="flex items-center space-x-2">
                                <span class="font-medium">เวลาเริ่มต้นของกิจกรรม:</span>
                                <span class="text-sm">{{ \Carbon\Carbon::parse($activity->start_datetime)->format('d-m-Y H:i') }}</span>
                            </div>

                            <div class="flex items-center space-x-2">
                                <span class="font-medium">เวลาสิ้นสุดของกิจกรรม:</span>
                                <span class="text-sm">{{ \Carbon\Carbon::parse($activity->end_datetime)->format('d-m-Y H:i') }}</span>
                            </div>
                        </div>
                    @endif

                        <!-- Display Join Condition (active or expired) -->
                        <div class="flex items-center space-x-4 mb-4">
                            @if ($activity->join_start_datetime && $activity->join_end_datetime)
                                <span class="px-3 py-1 rounded-full text-m font-medium w-fit
                                    @if ($activity->students->count() >= $activity->max_participants && $activity->max_participants != 0)
                                        bg-orange-100 text-orange-700
                                    @elseif (now()->isBefore($activity->join_start_datetime))
                                        bg-yellow-100 text-yellow-700
                                    @elseif (now()->isAfter($activity->join_end_datetime))
                                        bg-red-100 text-red-700
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
                    </li>
                @endforeach
            </ul>

        @if($filteredActivities->isEmpty())
                <p class="text-gray-500 mt-4">ไม่พบข้อมูล</p>
            @endif

        </section>
    </div>
</div>

</body>

