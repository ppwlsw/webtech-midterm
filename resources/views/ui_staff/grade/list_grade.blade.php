<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List grade</title>
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
    <div class="flex-1 p-6">
        <form method="GET" action="{{ route('query-students') }}">

            <!-- Search Bar -->
            <div class="mb-6">
                <input
                    type="text"
                    placeholder="ค้นหาด้วยรหัสวิชา"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                />
            </div>
            <div class="mb-6">
                <input
                    type="text"
                    placeholder="ค้นหาด้วยรหัสนิสิต"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                />
            </div>

            <!-- Filter -->
            <div class="bg-gray-200 p-4 rounded mb-6">
                <p class="font-bold mb-2">filter</p>
                <div class="space-y-2">
                    <label for="course-curriculum"> หลักสูตร </label>
                    <select name="course-curriculum">
                        <option value=""> เลือก </option>
                        <option value="2560"> 2560 </option>
                        <option value="2565"> 2565 </option>
                    </select>
                    <label for="student-type"> ภาคการศึกษา </label>
                    <select name="student-type">
                        <option value=""> เลือก </option>
                        <option value="regular"> ปกติ </option>
                        <option value="special"> พิเศษ </option>
                    </select>


                    <button type="submit"> </button>
                </div>
                <button type="submit"> Search </button>

            </div>


        </form>


        <!-- List -->
        <div class="space-y-4">
            <!-- List Item -->
            @foreach($data as $listItem)
                <div class="bg-gray-200 p-4 rounded flex justify-between items-center">
                    <p class="font-medium">{{ $listItem->student_code }}</p>
                    <p> {{ $listItem }}</p>
                    <p>{{ $listItem->first_name . " " . $listItem->last_name}}</p>
                </div>
            @endforeach
            <div class="bg-gray-200 p-4 rounded flex justify-between items-center">
                <p class="font-medium">6510405771</p>
                <p>name</p>
            </div>

            <!-- Repeat List Items -->

            <div class="bg-gray-200 p-4 rounded flex justify-between items-center">
                <p class="font-medium">6510405771</p>
                <p>name</p>
            </div>
            <div class="bg-gray-200 p-4 rounded flex justify-between items-center">
                <p class="font-medium">6510405771</p>
                <p>name</p>
            </div>
            <div class="bg-gray-200 p-4 rounded flex justify-between items-center">
                <p class="font-medium">6510405771</p>
                <p>name</p>
            </div>
        </div>

    </div>

</div>
</body>
</html>
