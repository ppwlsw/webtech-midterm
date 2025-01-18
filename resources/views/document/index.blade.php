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
        <!-- Header -->
        <a href="{{route('create-document')}}" class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-semibold">Document</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create new document</button>
        </a>

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
