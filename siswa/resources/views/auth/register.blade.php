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
            flex-direction: column;
        }

        .register-container {
            background-color: #252458;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            text-align: center;
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
            display: block;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-top: 5px;
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
            color: aqua;
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
            .register-container {
                margin: 10px;
                padding: 15px;
            }
        }
    </style>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
