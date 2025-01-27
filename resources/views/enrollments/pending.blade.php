@extends('layouts.nav')
@section('topic','นิสิตลงทะเบียนรายวิชา')
@props(['pendingEnrollments'])

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


<div class="pt-20 w-full bg-gray-100 font-sans">
    <div class="flex h-screen">
        <div class="w-2/12 bg-gray-100 p-4">
            @extends('layouts.sidebar')
        </div>
        <div class="flex-1 ml-11 p-6">
            <div class="flex flex-col gap-10">
                @php
                    $groupedEnrollments = $pendingEnrollments->groupBy('first_name');
                @endphp

                @foreach($groupedEnrollments as $studentName => $studentEnrollments)
                    <div class="bg-white shadow rounded-lg p-4 cursor-pointer hover:shadow-lg transition"
                         x-data="{ open: false }"
                         @click="open = !open">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold">
                                {{ $studentName }} {{ $studentEnrollments->first()->last_name }}
                            </h2>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ count($studentEnrollments) }} Course(s)
                            </span>
                        </div>

                        <div x-show="open" class="mt-6 space-y-4">
                            @foreach($studentEnrollments as $enrollment)
                                <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h2 class="text-lg font-semibold text-gray-800">{{ $enrollment->course_name }}</h2>
                                            <p class="text-sm text-gray-500">Course Code: {{ $enrollment->course_code }}</p>
                                            <p class="text-sm text-gray-500">Course Curriculum:  {{ $enrollment->course_curriculum }}</p>
                                        </div>
                                        <div class="flex space-x-3">
                                            <form action="{{ route('enrollments.approve') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="enrollment_id" value="{{ $enrollment->id }}">
                                                <button type="submit"
                                                        class="bg-green-500 text-white font-medium px-4 py-2 rounded-lg shadow-md text-xs hover:bg-green-600 transition">
                                                    Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('enrollments.reject') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="enrollment_id" value="{{ $enrollment->id }}">
                                                <button type="submit"
                                                        class="bg-red-500 text-white font-medium px-4 py-2 rounded-lg shadow-md text-xs hover:bg-red-600 transition">
                                                    Reject
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach
            </div>

            @if($groupedEnrollments->isEmpty())
                <div class="text-center text-gray-500 bg-white p-4 rounded-lg shadow">
                    No pending enrollments.
                </div>
            @endif
        </div>
    </div>
</div>

