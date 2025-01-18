<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Announcement</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
<div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen p-6">
        <h2 class="text-xl font-bold mb-6">Menu</h2>
        <ul class="space-y-4">
            <li><a href="#" class="block hover:underline">Home</a></li>
            <li><a href="#" class="block hover:underline">Announcements</a></li>
            <li><a href="#" class="block hover:underline">Activities</a></li>
            <li><a href="#" class="block hover:underline">Settings</a></li>
        </ul>
    </aside>

    <!-- Main -->
    <div class="flex-1 max-w-4xl mx-auto p-6">

        <!-- Create New Announcement -->
        <section class="bg-white p-6 rounded-md shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Create New Announcement</h2>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
            </div>

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
                <div class="flex space-x-4">
                    <div class="flex-1">
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input
                            type="date"
                            id="date"
                            name="date"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="flex-1">
                        <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
                        <input
                            type="time"
                            id="time"
                            name="time"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                </div>

                <!-- Max Participants -->
                <div>
                    <label for="max-participants" class="block text-sm font-medium text-gray-700">Max Participants</label>
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
</html>
