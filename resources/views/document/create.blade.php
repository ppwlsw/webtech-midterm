@extends('layouts/nav')
@section('topic','เอกสาร')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts/sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">
        <a href="{{route('document')}}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</button>
        </a>
        <!-- Create New Announcement -->
        <section class="bg-white p-6 rounded-md shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Create New Document</h2>
                <a href="{{route('document')}}">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                </a>
            </div>
        </section>

    </div>
</div>
</body>
