@props(['courses','listItem'])

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
        class="w-full bg-white p-3 rounded gap-6 cursor-pointer hover:bg-gray-50"
    >
        <section id="student-info">
            <div class="flex  justify-between items-center">
                <p class="text-xl font-medium">{{ $listItem->student_code }}</p>
                <p class="text-lg">{{ $listItem->first_name . " " . $listItem->last_name}}</p>
                <p class="">{{ $listItem->student_type }}</p>
                <p class="text-lg"> เกรดเฉลี่ย : {{ $gpa }}</p>
            </div>
        </section>
    </div>

    <div
        x-show="open"
        x-transition
        class="w-full mt-2"
    >
        <h3 class="text-lg font-semibold">ลงทะเบียนรายวิชา:</h3>
        @foreach ($courses as $course)

            @php
                $courseName = explode(',', $course['course_name']);
            @endphp
            <div class="flex flex-row justify-between w-full items-center">
                <div> รหัสวิชา : </div>
                <div>{{ $course['course_code'] }}</div>
                <div class="text-lg font-bold "> ชื่อวิชา:</div>
                <div> {{ $courseName[0] }} <br> {{ $courseName[1]}} </div>
                <div>  เกรด : {{ $course['course_grade'] }} </div>
            </div>
            <hr class="my-2">
        @endforeach
    </div>
</div>
