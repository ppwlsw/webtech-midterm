@extends('layouts.nav')
@section('topic', 'จัดการเกรดนิสิต')

<div class="pt-20 w-full">
    @extends('layouts/sidebar')
    <div class="flex justify-center h-screen w-screen">
            <div class="bg-white rounded-lg w-2/3">
                <div class="p-4  border-b ml-60">
                    <form action="{{ route('grades.index') }}" method="GET" class="flex items-center">
                        <input type="text" name="search" placeholder="ค้นหาด้วยชื่อ รหัสนิสิต"
                               class="flex-grow px-3 py-2 border rounded-l-md">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md">
                            ค้นหา
                        </button>
                    </form>
                </div>

                @foreach($students as $student)

                    <div class=" mb-4 p-6 border-black border-[1px] rounded-md
                     flex flex-row items-center justify-between w-full ml-40 transform hover:scale-105 duration-100">
                        <div class="flex flex-col justify-center">
                            <p> รหัสนิสิต </p>
                            <p class="font-bold text-lg">{{ $student->student_code }}</p>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <p> ชื่อ - นามสกุล </p>
                            <p class="font-bold text-lg">{{$student->first_name . " " . $student->last_name}}</p>
                        </div>
                        <div>
                            <a href="{{ route('grades.courses', $student->id) }}"
                               class="bg-green-400 text-white px-3 py-1 rounded hover:bg-green-600">
                                จัดการเกรด
                            </a>
                        </div>

                    </div>

                @endforeach

                <div class="p-4">
                    {{ $students->links() }}
                </div>
            </div>
    </div>
</div>


