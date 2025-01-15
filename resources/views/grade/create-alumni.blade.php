@extends('layouts/nav')
@section('topic','ศิษย์เก่า')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts/sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">
        <a href="{{route('grade')}}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</button>
        </a>

        <a href="{{route('alumni-grade')}}">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
        </a>

    </div>
</div>
</body>
