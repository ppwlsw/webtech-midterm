@extends('layouts.nav')
@section('topic','การเข้าร่วมกิจกรรม')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">

        <a href="{{route('profile')}}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Done</button>
        </a>
        <!-- Achievement -->
        <section class="bg-white p-6 rounded-md shadow-md">

            <!-- Detail Content -->
            <h3 class="text-lg font-bold mb-4">Activity Detail</h3>
            <div class="mt-6 space-y-4">
                <div class="bg-gray-100 p-4 rounded-md shadow-sm h-32">

                </div>
            </div>

            <!-- Picture -->
            <div class="mt-6">
                <h3 class="text-lg font-bold mb-4">Activity Picture</h3>
                <div class="bg-gray-200 h-48 rounded-md flex items-center justify-center">
                    <span class="text-gray-500">Picture Placeholder</span>
                </div>
            </div>

        </section>

    </div>

</div>
</body>
