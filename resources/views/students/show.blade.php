@extends('layouts.nav')
@section('topic','ประวัตินิสิต')

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


            <div class="flex justify-between items-center mb-10">
                <h2 class="text-2xl font-bold text-gray-800">Student Profile</h2>
                @if($student->student_status == 'active')
                    <a href="{{ route('students.edit' , $student) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Edit
                    </a>
                @endif

            </div>

            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-700">First Name</p>
                        <p class="text-blue-700">{{ $student->first_name }}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Last Name</p>
                        <p class="text-blue-700">{{$student->last_name}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Student Code</p>
                        <p class="text-blue-700">{{$student->student_code}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Curriculum</p>
                        <p class="text-blue-700">{{$student->curriculum}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Student Type</p>
                        <p class="text-blue-700">{{$student->student_type}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Address</p>
                        <p class="text-blue-700">{{$student->contact_info}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Telephone Number</p>
                        <p class="text-blue-700">{{$student->telephone_num}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Admission Channel</p>
                        <p class="text-blue-700">{{$student->admission_channel}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Year</p>
                        <p class="text-blue-700">{{$student->admission_year}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Student Status</p>
                        <p class="text-blue-700">{{$student->student_status}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Completion Year</p>
                        <p class="text-blue-700">{{$student->completion_year}}</p>
                    </div>
                </div>
            </div>

        </section>

        <div class="py-10">
            <a href="{{route('achievement')}}">
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Achievement</button>
            </a>

        </div>



    </div>

</div>
</body>
