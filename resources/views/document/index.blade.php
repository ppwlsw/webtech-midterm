@extends('layouts.nav')
@section('topic','เอกสาร')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>


    <!-- Main -->
    <div class="flex-1 p-6">

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

            <a href="{{route('pdf-ku3.pdf')}}" class="mb-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">KU3</button>
            </a>

            <a href="{{route('pdf-leave-request.pdf')}}" class="mb-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">ใบลาป่วย / ลากิจ</button>
            </a>

            <a href="{{route('pdf-resignation.pdf')}}" class="mb-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">ลาออก</button>
            </a>

        </div>
    </div>
</body>
