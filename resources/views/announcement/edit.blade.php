@extends('layouts.nav')
@section('topic','ข่าวสารนิสิต')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">
        <a href="{{route('announcement.show', ['activity' => $activity])}}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</button>
        </a>
        <!-- Create New Announcement -->
        <section class="mb-8">
            <form action="{{ route('announcement.update', ['activity' => $activity]) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    <h2 class="text-xl font-bold">Edit Announcement</h2>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>

                <!-- Topic Name -->
                <div>
                    <label for="topic-name" class="block text-sm font-medium text-gray-700">Topic Name</label>
                    @error('activity_name')
                        <p class="text-red-600 text-s">
                            {{ $message }}
                        </p>
                    @enderror
                    <input
                        type="text"
                        id="topic-name"
                        name="activity_name"
                        value="{{ old('activity_name', $activity->activity_name) }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-400 bg-red-100 @enderror"
                        placeholder="Enter topic name"
                    >
                </div>

                <!-- Type -->
                <div>
                    <label for="type" class="block text-gray-700 font-medium">Announcement Type</label>
                    @error('activity_type')
                    <p class="text-red-600 text-s">
                        {{ $message }}
                    </p>
                    @enderror
                    <select id="type" name="activity_type" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-400 bg-red-100 @enderror">
                        <option value="">Select type</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Seminar">Seminar</option>
                        <option value="Competition">Competition</option>
                        <option value="Department">Department</option>
                    </select>
                </div>

                <!-- Detail -->
                <div>
                    <label for="detail" class="block text-sm font-medium text-gray-700">Detail</label>
                    @error('activity_detail')
                        <p class="text-red-600 text-s">
                            {{ $message }}
                        </p>
                    @enderror
                    <textarea
                        id="detail"
                        name="activity_detail"
                        rows="4"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-400 bg-red-100 @enderror"
                        placeholder="Enter announcement detail"
                    >{{ old('activity_detail', $activity->activity_detail) }}</textarea>
                </div>

                <!-- Date and Time -->
                <div>
                    <label for="start_datetime" class="block text-sm font-medium text-gray-700">Start Time</label>
                    @error('start_datetime')
                        <p class="text-red-600 text-s">
                            {{ $message }}
                        </p>
                    @enderror
                    <input
                        type="datetime-local"
                        id="start_datetime"
                        name="start_datetime"
                        value="{{ old('start_datetime', $activity->start_datetime ? date('Y-m-d\\TH:i', strtotime($activity->start_datetime)) : '') }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-400 bg-red-100 @enderror">
                </div>

                <div>
                    <label for="end_datetime" class="block text-sm font-medium text-gray-700">End Time</label>
                    @error('end_datetime')
                        <p class="text-red-600 text-s">
                            {{ $message }}
                        </p>
                    @enderror
                    <input
                        type="datetime-local"
                        id="end_datetime"
                        name="end_datetime"
                        value="{{ old('end_datetime', $activity->end_datetime ? date('Y-m-d\\TH:i', strtotime($activity->end_datetime)) : '') }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-400 bg-red-100 @enderror">
                </div>

                <!-- Max Participants -->
                <div>
                    <label for="max-participants" class="block text-sm font-medium text-gray-700">Max
                        Participants</label>
                    @error('max_participants')
                        <p class="text-red-600 text-s">
                            {{ $message }}
                        </p>
                    @enderror
                    <input
                        type="number"
                        id="max-participants"
                        name="max_participants"
                        value="{{ old('max_participants', $activity->max_participants ?? '') }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-400 bg-red-100 @enderror"
                        placeholder="Enter max participants"
                    >
                </div>

                <!-- Condition -->
                <div>
                    <label for="condition" class="block text-sm font-medium text-gray-700">Condition</label>
                    @error('condition')
                        <p class="text-red-600 text-s">
                            {{ $message }}
                        </p>
                    @enderror
                    <textarea
                        id="condition"
                        name="condition"
                        rows="3"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-400 bg-red-100 @enderror"
                        placeholder="Enter condition"
                    >{{ old('condition', $activity->condition ?? '') }}</textarea>
                </div>
            </form>
        </section>

    </div>

</div>
</body>
