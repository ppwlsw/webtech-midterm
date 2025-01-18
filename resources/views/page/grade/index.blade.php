@extends('layouts.nav')
@section('topic','ตรวจสอบผลการเรียน')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">ตรวจสอบผลการเรียน</h1>
            <button class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Profile</button>
        </div>

        <!-- Alumni Info -->
        <div class="bg-gray-200 p-4 rounded mb-6 flex items-center justify-between">
            <div>
                <p class="text-lg font-medium">6510400000</p>
                <p class="text-lg">name</p>
            </div>
            <div class="space-x-2">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Status</button>
                <a href="{{route('create-alumni-grade')}}">
                    <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Alumni</button>
                </a>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex space-x-4 mb-6">
            <button class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">หน่วยกิตสะสม</button>
            <button class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">เกรดเฉลี่ยสะสม</button>
        </div>

        <!-- Filter -->
        <div class="flex justify-between items-start">

            <!-- Option -->
            <div class="bg-gray-200 p-4 rounded w-1/4">
                <p class="font-bold mb-4">Filter</p>
                <input
                    type="text"
                    placeholder="Search..."
                    class="mt-4 w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                />
                <br></br>
                <ul class="space-y-2">
                    <li>
                        <button class="w-full bg-white px-4 py-2 rounded hover:bg-gray-100">ปีการศึกษา</button>
                    </li>
                    <li>
                        <button class="w-full bg-white px-4 py-2 rounded hover:bg-gray-100">ภาคการศึกษา</button>
                    </li>
                    <a href="{{route('list-grade')}}">
                        <li>
                            <button class="w-full text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-500">Search
                            </button>
                        </li>
                    </a>
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

    </div>

</div>
</body>
