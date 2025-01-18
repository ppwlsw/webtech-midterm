<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
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

        <!-- Announcement -->
        <section class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Announcement</h2>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create new announcement</button>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-gray-200 p-4 rounded-md">Sample Open House</div>
                <div class="bg-gray-200 p-4 rounded-md"></div>
                <div class="bg-gray-200 p-4 rounded-md"></div>
            </div>
        </section>

        <!-- Search Bar -->
        <div class="mb-8">
            <input
                type="text"
                placeholder="Search..."
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
            >
        </div>

        <!-- List of Activity -->
        <section>
            <h2 class="text-xl font-bold mb-4">List of Activity</h2>
            <ul class="space-y-4">
                <li class="bg-white p-4 rounded-md shadow-sm">
                    Test text content
                </li>
                <!-- Add activities here -->
            </ul>
        </section>

    </div>

</div>
</body>
</html>
