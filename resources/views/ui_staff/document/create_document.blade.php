<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Document</title>
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
                <h2 class="text-xl font-bold">Create New Document</h2>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
            </div>
    </div>
</div>
</body>
</html>
