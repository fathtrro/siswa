<x-guest-layout>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1d002c;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column; /* Ensures items are centered vertically */
        }

        .login-container {
            background-color: #252458;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px 20px 100px 20px;
            max-width: 400px;
            width: 100%;
            height: 100vh;
            margin: 0 auto;  /* Ensure center alignment */
            text-align: center; /* Center align the text */
        }

        h2 {
            color: aqua;
            text-align: center;
            margin-bottom: 20px;
        }

        .block {
            margin-bottom: 15px;
        }

        .block label {
            color: aqua;
            font-weight: bold;
            text-align: left;
            display: block; /* Ensure the label text is aligned to the left */
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-top: 5px;
            background-color: #1d002c;
            color: #fff;
        }

        .error {
            color: #f8d7da;
            background-color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .block.mt-4 {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .block.mt-4 label {
            display: flex;
            align-items: center;
            color: aqua; /* Ensuring the color is consistent */
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .flex.items-center {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .flex.items-center a {
            color: aqua;
            text-decoration: none;
        }

        .flex.items-center a:hover {
            text-decoration: underline;
        }

        button {
            background-color: aqua;
            color: #252458;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #00cccc;
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 15px;
                margin: 0 auto;
                text-align: center;
            }
        }
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="block">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 error" />
            </div>

            <!-- Password -->
            <div class="block mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 error" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>