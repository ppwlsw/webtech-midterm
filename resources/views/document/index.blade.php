@extends('layouts.nav')
@section('topic','เอกสาร')

{{--<body class="pt-20 w-full bg-gray-100 font-sans">--}}
{{--<div class="flex h-screen">--}}
{{--    <!-- Sidebar -->--}}
{{--    <div class="w-2/12 bg-gray-100 p-4">--}}
{{--        @extends('layouts.sidebar')--}}
{{--    </div>--}}


{{--    <!-- Main -->--}}
{{--    <div class="p-6">--}}

{{--        <h1 class="text-2xl font-bold"> Available Document</h1>--}}
{{--        <br>--}}
{{--        <!-- Document List -->--}}
{{--        <div class="bg-gray-200 p-4 rounded">--}}

{{--            <a href="{{route('pdf-ku3.pdf')}}" class="">--}}
{{--                <button class="bg-blue-500 text-white w-96 px-4 py-2 mb-5 rounded hover:bg-blue-600">KU3</button>--}}
{{--            </a>--}}
{{--            <br>--}}
{{--            <a href="{{route('pdf-leave-request.pdf')}}" class="mb-4">--}}
{{--                <button class="bg-blue-500 text-white w-96 px-4 py-2 mb-5 rounded hover:bg-blue-600">ใบลาป่วย / ลากิจ</button>--}}
{{--            </a>--}}
{{--            <br>--}}
{{--            <a href="{{route('pdf-resignation.pdf')}}" class="mb-4">--}}
{{--                <button class="bg-blue-500 text-white w-96 px-4 py-2 mb-5 rounded hover:bg-blue-600">ลาออก</button>--}}
{{--            </a>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</body>--}}

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-2/12 bg-gray-100 p-4">
    @extends('layouts.sidebar')
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl p-6">


    <!-- Box 1 -->
    <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col items-center text-center">
        <h2 class="text-xl font-bold text-gray-800">KU 3</h2>
        <p class="text-gray-600 mt-2">
            แบบขอเปลี่ยนแปลงการลงทะเบียนเรียน
        </p>
        <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            <a href="{{route('pdf-ku3.pdf')}}">Download</a>
        </button>
    </div>

    <!-- Box 2 -->
    <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col items-center text-center">
        <h2 class="text-xl font-bold text-gray-800">ใบลาป่วย / ลากิจ</h2>
        <p class="text-gray-600 mt-2">
            คำร้องขอลาป่วย หรือ ลากิจ
        </p>
        <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            <a href="{{route('pdf-leave-request.pdf')}}">Download</a>
        </button>
    </div>

    <!-- Box 3 -->
    <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col items-center text-center">
        <h2 class="text-xl font-bold text-gray-800">ลาออก</h2>
        <p class="text-gray-600 mt-2">
            ใบขอลาออก
        </p>
        <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            <a href="{{route('pdf-resignation.pdf')}}">Download</a>
        </button>
    </div>

    <!-- Box 4 -->
    <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col items-center text-center">
        <h2 class="text-xl font-bold text-gray-800">KU 1</h2>
        <p class="text-gray-600 mt-2">
            แบบลงทะเบียนเรียน
        </p>
        <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            <a href="{{route('pdf-ku1.pdf')}}">Download</a>
        </button>
    </div>

    <!-- Box 5 -->
    <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col items-center text-center">
        <h2 class="text-xl font-bold text-gray-800">คำร้องขอทั่วไป</h2>
        <p class="text-gray-600 mt-2">
            คำร้องขอเรื่องทั่วไป
        </p>
        <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            <a href="{{route('pdf-general-request.pdf')}}">Download</a>
        </button>
    </div>

    <!-- Box 6 -->
    <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col items-center text-center">
        <h2 class="text-xl font-bold text-gray-800">ใบขอเรียนร่วม</h2>
        <p class="text-gray-600 mt-2">
            คำร้องขอลงทะเบียนเรียนร่วม
        </p>
        <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            <a href="{{route('pdf-study-colab.pdf')}}">Download</a>
        </button>
    </div>

</div>

</body>
