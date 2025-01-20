@vite(['resources/css/app.css' , 'resource/js/app.js'])

<body class="bg-gray-100 font-sans flex items-center justify-center">

    <!-- Login Form -->
    <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">L O G I N</h1>
        <form action="#" method="POST" class="space-y-6">

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                >
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                >
            </div>

            <!-- Submit Button -->
            <div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Login
                </button>
            </div>

        </form>

        <!-- Other function -->
{{--        <div class="mt-6 text-center">--}}
{{--            <p class="text-sm text-gray-600">Don't have an account? <a href="#" class="text-blue-500 hover:underline">Sign up</a></p>--}}
{{--            <p class="text-sm text-gray-600 mt-2"><a href="#" class="text-blue-500 hover:underline">Forgot your password?</a></p>--}}
{{--        </div>--}}
    </div>

</body>
