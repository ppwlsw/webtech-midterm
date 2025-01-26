@extends('layouts.nav')
@section('topic', 'จัดการเกรดนิสิต')

<div class="pt-20 w-full">
    @extends('layouts/sidebar')
    <div class="flex justify-center h-screen ml-20 w-screen">
        <div class="px-4 py-6">
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-4  border-b">
                    <form action="{{ route('grades.index')}}}" method="GET" class="flex items-center">
                        <input type="text" name="search" placeholder="ค้นหาด้วยชื่อ รหัสนิสิต"
                               value="{{ request('search') }}"
                               class="flex-grow px-3 py-2 border rounded-l-md">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md">
                            ค้นหา
                        </button>
                    </form>
                </div>

                <table class="w-full">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left">รหัสนิสิต</th>
                        <th class="px-4 py-2 text-left">ชื่อ</th>
                        <th class="px-4 py-2 text-left">นามสกุล</th>
                        <th class="px-4 py-2 text-center">การดำเนินการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $student->student_code }}</td>
                            <td class="px-4 py-2">{{ $student->first_name }}</td>
                            <td class="px-4 py-2">{{ $student->last_name }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('grades.courses', $student->id) }}"
                                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                    จัดการเกรด
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


