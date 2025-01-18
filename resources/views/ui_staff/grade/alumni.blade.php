<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni</title>
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

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">ตรวจสอบผลการเรียน</h1>
            <button class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Profile</button>
        </div>

        <!-- User Info -->
        <div class="bg-gray-200 p-4 rounded mb-6 flex items-center justify-between">
            <div>
                <p class="text-lg font-medium">6510400000</p>
                <p class="text-lg">name</p>
            </div>
            <div class="space-x-2">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Status</button>
                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Alumni</button>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex space-x-4 mb-6">
            ปัจจุบันทำอาชีพ <br>
            บริษัท <br>
            ผลงาน
        </div>

        <!-- Filter -->
        <div class="flex justify-between items-start">

            <!-- Options -->
            <div class="bg-gray-200 p-4 rounded w-1/4">
                <p class="font-bold mb-4">Filter</p>
                <input
                    type="text"
                    placeholder="Search..."
                    class="mt-4 w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                />
                <br></br>
                <ul class="space-y-2">
                    <li><button class="w-full bg-white px-4 py-2 rounded hover:bg-gray-100">ปีการศึกษา</button></li>
                    <li><button class="w-full bg-white px-4 py-2 rounded hover:bg-gray-100">ภาคการศึกษา</button></li>
                </ul>

            </div>

            <!-- Grade Table -->
            <div class="bg-white p-4 rounded shadow-md w-3/4">
                <p class="text-lg font-bold mb-4">การแสดงผล grade</p>
                <table class="w-full border-collapse">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">รหัสวิชา</th>
                        <th class="border px-4 py-2">หน่วยกิต</th>
                        <th class="border px-4 py-2">ชื่อวิชา</th>
                        <th class="border px-4 py-2">เกรด</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border px-4 py-2">0001</td>
                        <td class="border px-4 py-2">3</td>
                        <td class="border px-4 py-2">Webtech</td>
                        <td class="border px-4 py-2">
                            D+
                            <!-- <select class="w-full bg-white border rounded px-2 py-1 focus:outline-none focus:ring focus:border-blue-300">
                              <option>D+</option>
                            </select> -->
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <br>

        <!-- Button to trigger pop-up -->
        <button
            id="openModal"
            class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none"
        >
            Open Pop-up
        </button>

        <!-- Pop-up (hidden by default) -->
        <div
            id="modal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden"
        >
            <div class="bg-white p-6 rounded-md w-1/3">

                <!-- Alert Input Form -->
                <section class="bg-white p-1 rounded-md ">
                    <h2 class="text-xl font-bold mb-6">Alumni</h2>
                    <form action="#" method="POST" class="space-y-4">
                        <!-- Workplace Input -->
                        <div>
                            <label for="workplace" class="block text-sm font-medium text-gray-700">Workplace</label>
                            <input
                                type="text"
                                id="workplace"
                                name="workplace"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Enter workplace">
                        </div>

                        <!-- Contribution Input -->
                        <div>
                            <label for="contribution" class="block text-sm font-medium text-gray-700">Contribution</label>
                            <input
                                type="text"
                                id="contribution"
                                name="contribution"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Enter contribution">
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button
                                id="closeModal"
                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none"
                            >
                                Close
                            </button>
                            <button
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none"
                            >
                                Confirm
                            </button>
                        </div>
            </div>
        </div>

        <!-- JavaScript for Modal Behavior -->
        <script>
            const modal = document.getElementById("modal");
            const openModal = document.getElementById("openModal");
            const closeModal = document.getElementById("closeModal");

            openModal.addEventListener("click", () => {
                modal.classList.remove("hidden");
            });

            closeModal.addEventListener("click", () => {
                modal.classList.add("hidden");
            });

            window.addEventListener("click", (e) => {
                if (e.target === modal) {
                    modal.classList.add("hidden");
                }
            });
        </script>

    </div>

</div>
</body>
</html>
