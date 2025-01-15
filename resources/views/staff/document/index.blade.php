<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-screen flex">
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
<div class="flex-1 p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Document</h1>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create new document</button>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input
            type="text"
            placeholder="Search..."
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400"
        />
    </div>

    <!-- Document List -->
    <div class="bg-gray-200 p-4 rounded">
        <!-- Filters -->
        <div class="mb-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">List of categories</button>
        </div>

        <!-- All Document Table -->
        <div class="p-4 bg-gray-300 h-48 rounded">All document table</div>
    </div>
</div>
</body>
</html>
