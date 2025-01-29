@extends('layouts.nav')
@section('topic','ข่าวสารนิสิต')

<body>
<div class="w-2/12 bg-gray-100 p-4">
    @extends('layouts.sidebar')
</div>

<div class="min-h-screen bg-gray-100 pt-20">
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
    <!-- Main -->
    <div class="max-w-4xl mx-auto p-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">เพิ่มข้อมูลประกาศ</h1>
            <p class="text-gray-600">กรอกข้อมูลประกาศใหม่</p>
        </div>

        <!-- Create New Announcement -->
        <section>
            <form action="{{ route('announcement.store') }}" method="POST" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6" enctype="multipart/form-data">
                @csrf

                <!-- Topic Name -->
                <div class="space-y-3 mb-5">
                    <div class="flex items-center space-x-1">
                        <h3 class="text-lg font-normal text-gray-900">ชื่อประกาศ</h3>
                        <p class="text-red-500 font-bold">*</p>
                    </div>

                    @error('activity_name')
                    <p class="text-red-600 text-s">
                        {{ $message }}
                    </p>
                    @enderror
                    <input
                        type="text"
                        id="topic-name"
                        name="activity_name"
                        value="{{ old('activity_name') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('activity_name') border-red-400 bg-red-100 @enderror"
                        placeholder="กรอกชื่อประกาศ" required
                    >
                </div>

                <!-- Type -->
                <div class="space-y-3 mb-5">
                    <div class="flex items-center space-x-1">
                        <h3 class="text-lg font-normal text-gray-900">ประเภทประกาศ</h3>
                        <p class="text-red-500 font-bold">*</p>
                    </div>
                    @error('activity_type')
                    <p class="text-red-600 text-s">
                        {{ $message }}
                    </p>
                    @enderror
                    <div class="flex items-center space-x-2">
                        <select id="activityType" name="activity_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('activity_type') border-red-400 bg-red-100 @enderror">
                            <option value="" selected>เลือกประเภท</option>
                            @foreach ($activityTypes as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>

                        <!-- adding new activity type -->
                        <input type="text" id="newActivityType" placeholder="เพิ่มประเภทใหม่" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">

                        <!-- add new type dropdown -->
                        <button type="button" id="addActivityTypeBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            เพิ่ม
                        </button>
                    </div>
                </div>


                <!-- Detail -->
                <div class="space-y-3 mb-5">
                    <div class="flex items-center space-x-1">
                        <h3 class="text-lg font-normal text-gray-900">รายละเอียด</h3>
                        <p class="text-red-500 font-bold">*</p>
                    </div>
                    @error('activity_detail')
                    <p class="text-red-600 text-s">
                        {{ $message }}
                    </p>
                    @enderror
                    <textarea
                        id="detail"
                        name="activity_detail"
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('activity_detail') border-red-400 bg-red-100 @enderror"
                        placeholder="กรอกข้อมูลประกาศ" required
                    >{{ old('activity_detail') }}</textarea>
                </div>

                <!-- Date and Time -->

                <div class="grid grid-cols-2 gap-6 mb-5">
                    <div class="space-y-2">
                        <h3 class="text-lg font-normal text-gray-900">เวลาเริ่มต้นการรับสมัคร</h3>
                        @error('join_start_datetime')
                        <p class="text-red-600 text-s">
                            {{ $message }}
                        </p>
                        @enderror
                        <input
                            type="datetime-local"
                            id="join_start_datetime"
                            name="join_start_datetime"
{{--                            value="{{ old('join_start_datetime') }}"--}}
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('join_start_datetime') border-red-400 bg-red-100 @enderror">
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-lg font-normal text-gray-900">เวลาสิ้นสุดการรับสมัคร</h3>
                        @error('join_end_datetime')
                        <p class="text-red-600 text-s">
                            {{ $message }}
                        </p>
                        @enderror
                        <input
                            type="datetime-local"
                            id="join_end_datetime"
                            name="join_end_datetime"
{{--                            value="{{ old('join_end_datetime') }}"--}}
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('join_end_datetime') border-red-400 bg-red-100 @enderror">
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-6 mb-5">
                    <div class="space-y-2">
                        <h3 class="text-lg font-normal text-gray-900">เวลาเริ่มต้นของกิจกรรม</h3>
                        @error('start_datetime')
                        <p class="text-red-600 text-s">
                            {{ $message }}
                        </p>
                        @enderror
                        <input
                            type="datetime-local"
                            id="start_datetime"
                            name="start_datetime"
{{--                            value="{{ old('start_datetime') }}"--}}
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('start_datetime') border-red-400 bg-red-100 @enderror">
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-lg font-normal text-gray-900">เวลาสิ้นสุดของกิจกรรม</h3>
                        @error('end_datetime')
                        <p class="text-red-600 text-s">
                            {{ $message }}
                        </p>
                        @enderror
                        <input
                            type="datetime-local"
                            id="end_datetime"
                            name="end_datetime"
{{--                            value="{{ old('end_datetime') }}"--}}
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('end_datetime') border-red-400 bg-red-100 @enderror">
                    </div>
                </div>


                <!-- Max Participants -->
                <div class="space-y-3 mb-5">
                    <h3 class="text-lg font-normal text-gray-900">จำนวนผู้เข้าร่วมที่เปิดรับ</h3>
                    <input
                        type="number"
                        id="max-participants"
                        name="max_participants"
                        value="{{ old('max_participants') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                        placeholder="กรอกจำนวนผู้เข้าร่วมที่เปิดรับ"
                    >
                </div>

                <!-- Condition -->
                <div class="space-y-3 mb-5">
                    <h3 class="text-lg font-normal text-gray-900">เงื่อนไขการเข้าร่วม</h3>
                    <div class="flex items-center space-x-2">
                        <select id="condition" name="condition" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="" selected>เลือกเงื่อนไข</option>
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition }}">{{ $condition }}</option>
                            @endforeach
                        </select>

                        <!-- adding new condition -->
                        <input type="text" id="newCondition" placeholder="เพิ่มเงื่อนไขใหม่" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">

                        <!-- add new condition dropdown -->
                        <button type="button" id="addConditionBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            เพิ่ม
                        </button>
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
        </section>

    </div>

</div>
</body>


<script>
    // Add new type to dropdown
    document.getElementById('addActivityTypeBtn').addEventListener('click', function () {
        const newTypeInput = document.getElementById('newActivityType');
        const dropdown = document.getElementById('activityType');
        const newValue = newTypeInput.value.trim();

        if (newValue) {
            const exists = Array.from(dropdown.options).some(option => option.value === newValue);
            if (!exists) {
                const newOption = document.createElement('option');
                newOption.value = newValue;
                newOption.textContent = newValue;
                dropdown.appendChild(newOption);
                dropdown.value = newValue;
            } else {
                alert('ประเภทนี้มีอยู่ในตัวเลือกประเภทแล้ว');
            }
            newTypeInput.value = '';
        } else {
            alert('กรุณาใส่ประเภทที่ต้องการเพิ่ม');
        }
    });

    // Add new condition to dropdown
    document.getElementById('addConditionBtn').addEventListener('click', function () {
        const newConditionInput = document.getElementById('newCondition');
        const dropdown = document.getElementById('condition');
        const newValue = newConditionInput.value.trim();

        if (newValue) {
            const exists = Array.from(dropdown.options).some(option => option.value === newValue);
            if (!exists) {
                const newOption = document.createElement('option');
                newOption.value = newValue;
                newOption.textContent = newValue;
                dropdown.appendChild(newOption);
                dropdown.value = newValue;
            } else {
                alert('เงื่อนไขนี้มีอยู่ในตัวเลือกเงื่อนไขแล้ว');
            }
            newConditionInput.value = '';
        } else {
            alert('กรุณาใส่เงื่อนไขที่ต้องการเพิ่ม');
        }
    });
</script>
