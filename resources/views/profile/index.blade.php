@extends('layouts.nav')
@section('topic','ประวัตินิสิต')
@props(['data'])

<body class="pt-20 bg-gray-50 font-sans min-h-screen">
<div class="flex">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-md">
        @extends('layouts.sidebar')
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Student Profile Card -->
        <section class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Student Profile</h2>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Edit
                    </button>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Personal Information -->
                    <div class="space-y-6">
                        <h3 class="font-semibold text-gray-600 text-sm uppercase tracking-wider">Personal Information</h3>

                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">First Name</p>
                                <p class="mt-1 text-gray-900 font-medium">{{ $data->first_name }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500">Last Name</p>
                                <p class="mt-1 text-gray-900 font-medium">{{ $data->last_name }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500">Student Code</p>
                                <p class="mt-1 text-gray-900 font-medium">{{ $data->student_code }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Academic Information -->
                    <div class="space-y-6">
                        <h3 class="font-semibold text-gray-600 text-sm uppercase tracking-wider">Academic Information</h3>

                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Curriculum</p>
                                <p class="mt-1 text-gray-900 font-medium">{{ $data->curriculum }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500">Student Type</p>
                                <p class="mt-1 text-gray-900 font-medium">
                                    @if($data->student_type == 'special')
                                        พิเศษ
                                    @elseif($data->student_type == 'regular')
                                        ปกติ
                                    @endif
                                </p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500">Student Status</p>
                                <span class="mt-1 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        @if($data->student_status == 'active')
                                            bg-green-100 text-green-800
                                        @else
                                            bg-red-100 text-red-800
                                        @endif
                                    ">
                                        {{ ucfirst($data->student_status) }}
                                    </span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-6">
                        <h3 class="font-semibold text-gray-600 text-sm uppercase tracking-wider">Contact Information</h3>

                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Address</p>
                                <p class="mt-1 text-gray-900 font-medium">{{ $data->contact_info }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500">Telephone Number</p>
                                <p class="mt-1 text-gray-900 font-medium">{{ $data->telephone_num }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Admission Information -->
                    <div class="space-y-6">
                        <h3 class="font-semibold text-gray-600 text-sm uppercase tracking-wider">Admission Details</h3>

                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Admission Channel</p>
                                <p class="mt-1 text-gray-900 font-medium">Round: {{ $data->admission_channel }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500">Admission Year</p>
                                <p class="mt-1 text-gray-900 font-medium">{{ $data->admission_year }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500">Completion Year</p>
                                <p class="mt-1 text-gray-900 font-medium">
                                    @if($data->student_status == 'active')
                                        -
                                    @else
                                        2025
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Action Buttons -->
        <div class="mt-8 flex gap-4">
            <a href="{{ route('achievement') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
                Achievement
            </a>

            <a href="{{ route('activity') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Activity
            </a>
        </div>
    </div>
</div>
</body>
