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
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-6">Student Profile</h2>

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

            <a href="{{route('activity')}}">
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Activity</button>
            </a>
        </div>
        {{--        <!-- Achievements -->--}}
        {{--        <section class="bg-white p-6 rounded-md shadow-md mt-6">--}}
        {{--            <h2 class="text-xl font-bold mb-4">Achievements</h2>--}}
        {{--            <p class="text-gray-700">No achievements added yet.</p>--}}
        {{--            <a href="{{route('achievement')}}">--}}
        {{--            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Achievement</button>--}}
        {{--            </a>--}}
        {{--        </section>--}}

        {{--        <!-- Activity -->--}}
        {{--        <section class="bg-white p-6 rounded-md shadow-md mt-6">--}}
        {{--            <h2 class="text-xl font-bold mb-4">Activity</h2>--}}
        {{--            <p class="text-gray-700">No achievements added yet.</p>--}}
        {{--            <a href="{{route('activity')}}">--}}
        {{--                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Achievement</button>--}}
        {{--            </a>--}}
        {{--        </section>--}}


        <!-- Button to trigger pop-up -->
        <button
            id="openModal"
            class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none"
        >
            Update Status
        </button>
        <button
            id="openModal"
            class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none"
        >
            Alumni
        </button>

        <!-- Pop-up (hidden by default) -->
        <div
            id="modal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden"
        >
            <div class="bg-white p-6 rounded-md w-1/3">

                <!-- Alert Input Form -->
                <section class="bg-white p-1 rounded-md ">
                    <h2 class="text-xl font-bold mb-6">Alumni</h2>
                    <section action="#" method="POST" class="space-y-4">
                        <!-- Workplace Input -->
                        <div>
                            <label for="workplace" class="block text-sm font-medium text-gray-700">Workplace</label>
                            <input
                                type="text"
                                id="workplace"
                                name="workplace"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Enter workplace">
                        </div>

                        <!-- Contribution Input -->
                        <div>
                            <label for="contribution" class="block text-sm font-medium text-gray-700">Contribution</label>
                            <input
                                type="text"
                                id="contribution"
                                name="contribution"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Enter contribution">
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button
                                id="closeModal"
                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none"
                            >
                                Close
                            </button>
                            <button
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none"
                            >
                                Confirm
                            </button>
                        </div>


            </div>
        </div>

        <!-- JavaScript for Modal Behavior -->
        <script>
            const modal = document.getElementById("modal");
            const openModal = document.getElementById("openModal");
            const closeModal = document.getElementById("closeModal");

            openModal.addEventListener("click", () => {
                modal.classList.remove("hidden");
            });

            closeModal.addEventListener("click", () => {
                modal.classList.add("hidden");
            });

            window.addEventListener("click", (e) => {
                if (e.target === modal) {
                    modal.classList.add("hidden");
                }
            });
        </script>

    </div>

</div>
</body>
