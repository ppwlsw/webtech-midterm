@vite(['resources/css/app.css' , 'resource/js/app.js'])

<body class="bg-gray-100 font-sans flex items-center justify-center">

    <!-- Login Form -->
    <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">L O G I N</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
        <!-- Other function -->
{{--        <div class="mt-6 text-center">--}}
{{--            <p class="text-sm text-gray-600">Don't have an account? <a href="#" class="text-blue-500 hover:underline">Sign up</a></p>--}}
{{--            <p class="text-sm text-gray-600 mt-2"><a href="#" class="text-blue-500 hover:underline">Forgot your password?</a></p>--}}
{{--        </div>--}}
    </div>

</body>
