<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">

<nav class="fixed top-0 z-50 w-10/12 right-0 bg-green-600 font-kanit">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">

                <div class="flex ms-2 md:me-24 h-12">
                    <span class="self-center text-xl font-semi-bold sm:text-2xl whitespace-nowrap dark:text-white">
                        @yield('topic')
                    </span>
                </div>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button" class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">

                            <img class="h-[55px]" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/KU_SubLogo_Thai.png/1200px-KU_SubLogo_Thai.png">
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
