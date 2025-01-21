@extends('layouts.nav')
@section('topic','ข้อมูลศิษย์เก่า')
@props(['alumnus'])
t

<body class="pt-20 w-full bg-gray-100 font-sans">
<div class="flex h-screen">

    <!-- Sidebar -->
    <div class="w-2/12 bg-gray-100 p-4">
        @extends('layouts.sidebar')
    </div>

    <!-- Main -->
    <div class="flex-1 p-6">

        <a href="{{route('alumni.index')}}" class="flex justify-between items-center mb-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Back</button>
        </a>

        <!-- Student Profile -->
        <section class="bg-white p-6 rounded-md shadow-md">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-6">Student Profile</h2>

            </div>


            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-700">First Name</p>
                        <p class="text-blue-700">{{ $alumnus->student->first_name}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Last Name</p>
                        <p class="text-blue-700">{{$alumnus->student->last_name}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Student Code</p>
                        <p class="text-blue-700">{{$alumnus->student->student_code}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Curriculum</p>
                        <p class="text-blue-700">{{$alumnus->student->curriculum}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Student Type</p>
                        <p class="text-blue-700">{{$alumnus->student->student_type}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Address</p>
                        <p class="text-blue-700">{{$alumnus->student->contact_info}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Telephone Number</p>
                        <p class="text-blue-700">{{$alumnus->student->telephone_num}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Admission Channel</p>
                        <p class="text-blue-700">{{$alumnus->student->admission_channel}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Year</p>
                        <p class="text-blue-700">{{$alumnus->student->admission_year}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Student Status</p>
                        <p class="text-blue-700">{{$alumnus->student->student_status}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Completion Year</p>
                        <p class="text-blue-700">{{$alumnus->student->completion_year}}</p>
                    </div>
                </div>
            </div>

        </section>

        <br>
        <section  class="bg-white p-6 rounded-md shadow-md">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-6">Alumni</h2>

            </div>


            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Workplace</p>
                        <p class="text-blue-700">{{ $alumnus->workplace }}</p>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Contribution</p>
                        <p class="text-blue-700">{{ $alumnus->contribution }}</p>
                    </div>
                </div>
            </div>


        </section>
        <br>
    </div>
</div>
</body>
