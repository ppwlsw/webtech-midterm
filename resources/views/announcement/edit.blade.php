@extends('layouts.nav')
@section('topic','ข่าวสารนิสิต')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    //role
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">
        <a href="{{route('detail-announcement')}}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</button>
        </a>
        <!-- Create New Announcement -->
        <section class="mb-8">
            <a href="{{route('announcement')}}" class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Edit Announcement</h2>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
            </a>

            <form action="#" method="POST" class="space-y-4">
                <!-- Topic Name -->
                <div>
                    <label for="topic-name" class="block text-sm font-medium text-gray-700">Topic Name</label>
                    <input
                        type="text"
                        id="topic-name"
                        name="topic-name"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="Enter topic name">
                </div>

                <!-- Detail -->
                <div>
                    <label for="detail" class="block text-sm font-medium text-gray-700">Detail</label>
                    <textarea
                        id="detail"
                        name="detail"
                        rows="4"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="Enter details here">
                    </textarea>
                </div>

                <!-- Date and Time -->
                <div>
                    <label for="datetime" class="block text-sm font-medium text-gray-700">Date and Time</label>
                    <input
                        type="datetime-local"
                        id="datetime"
                        name="datetime"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <!-- Max Participants -->
                <div>
                    <label for="max-participants" class="block text-sm font-medium text-gray-700">Max
                        Participants</label>
                    <input
                        type="number"
                        id="max-participants"
                        name="max-participants"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="Enter max participants">
                </div>

                <!-- Condition -->
                <div>
                    <label for="condition" class="block text-sm font-medium text-gray-700">Condition</label>
                    <textarea
                        id="condition"
                        name="condition"
                        rows="3"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="Enter conditions">
                    </textarea>
                </div>
            </form>
        </section>

    </div>

</div>
</body>
