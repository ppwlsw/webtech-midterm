@extends('layouts.nav')
@section('topic','ข้อมูลศิษย์เก่า')

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">
        <!-- Student Profile -->
        <section class="bg-white p-6 rounded-md shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Alumni List</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($alumni as $alumnus)
                    <a href="{{ route('alumni.show', ['alumnus' => $alumnus->id]) }}"
                       class="block bg-gradient-to-br from-blue-100 to-blue-200 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="text-center">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Student ID</h4>
                            <p class="text-gray-700 text-sm font-medium">{{ $alumnus->student->student_code }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

    </div>
</div>
</body>
