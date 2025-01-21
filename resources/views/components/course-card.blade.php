@props(['courses', 'listItem'])
@php
        $gradePoints = [
            'A' => 4.0,
            'B+' => 3.5,
            'B' => 3.0,
            'C+' => 2.5,
            'C' => 2.0,
            'D+' => 1.5,
            'D' => 1.0,
            'F' => 0.0
        ];

        $totalPoints = 0;
        $totalCredits = 0;

        foreach ($courses as $course) {
            if (isset($course['course_grade']) && isset($course['credit'])) {
                $totalPoints += ($gradePoints[$course['course_grade']] ?? 0) * $course['credit'];
                $totalCredits += $course['credit'];
            }
        }

        $gpa = $totalCredits > 0 ? round($totalPoints / $totalCredits, 2) : 0.00;
@endphp

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{ open: false }" class="w-full">
    <div
        @click="open = !open"
        class="w-full bg-white rounded-lg shadow-sm border border-gray-200 hover:border-blue-300 transition-all duration-200 cursor-pointer"
    >
        <div class="p-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">รหัสนิสิต</span>
                        <span class="text-lg font-semibold">{{ $listItem->student_code }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">ชื่อ-นามสกุล</span>
                        <span class="text-lg">{{ $listItem->first_name . " " . $listItem->last_name}}</span>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="flex flex-col items-end">
                        <span class="text-sm text-gray-500">ประเภท</span>
                        <span class="px-3 py-1 rounded-full text-sm
                            {{ $listItem->student_type === 'regular' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ $listItem->student_type === 'regular' ? 'ภาคปกติ' : 'ภาคพิเศษ' }}
                        </span>
                    </div>
                    <div class="flex flex-col items-end">
                        <span class="text-sm text-gray-500">เกรดเฉลี่ย</span>
                        <span class="text-lg font-semibold {{ $gpa >= 3.0 ? 'text-green-600' : ($gpa >= 2.0 ? 'text-yellow-600' : 'text-red-600') }}">
                            {{ number_format($gpa, 2) }}
                        </span>
                    </div>
                    <div class="text-gray-400">
                        <svg
                            class="w-6 h-6 transform transition-transform duration-200"
                            :class="{'rotate-180': open}"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        class="mt-2 bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden"
    >
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">รายวิชาที่ลงทะเบียน</h3>
            <div class="space-y-4">
                @foreach ($courses as $course)
                    @php
                        $courseName = explode(',', $course['course_name']);
                    @endphp
                    <div class="grid grid-cols-5 gap-4 py-3 items-center">
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-500">รหัสวิชา</span>
                            <span class="font-medium">{{ $course['course_code'] }}</span>
                        </div>
{{--                        <div class="flex flex-col">--}}
{{--                            <span class="text-sm text-gray-500">รหัสวิชา</span>--}}
{{--                            <span class="font-medium">{{ $course['academic_year'] }}</span>--}}
{{--                        </div>--}}
                        <div class="col-span-2 flex flex-col">
                            <span class="text-sm text-gray-500">ชื่อวิชา</span>
                            <span class="font-medium">{{ $courseName[0] }}</span>
                            <span class="text-sm text-gray-600">{{ $courseName[1] }}</span>
                        </div>
                        <div class="flex flex-col items-end">
                            <span class="text-sm text-gray-500">เกรด</span>
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                                {{ $course['course_grade'] === 'A' ? 'bg-green-100 text-green-700' :
                                   ($course['course_grade'] === 'F' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700') }}">
                                {{ $course['course_grade'] }}
                            </span>
                        </div>
                    </div>
                    @unless($loop->last)
                        <hr class="border-gray-200">
                    @endunless
                @endforeach
            </div>
        </div>
    </div>
</div>
