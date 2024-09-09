<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Data Siswa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */ */

            * {
                box-sizing: border-box;
            }

            :host, html {
                line-height: 1.5;
                -webkit-text-size-adjust: 100%;
                font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
                font-feature-settings: normal;
                font-variation-settings: normal;
                -webkit-tap-highlight-color: transparent;
            }

            body {
                margin: 0;
                padding: 0;
                line-height: inherit;
                background: #1d002c;
            }

            a {
                color: inherit;
                text-decoration: inherit;
            }

            button, input, optgroup, select, textarea {
                font-family: inherit;
                font-size: 100%;
                font-weight: inherit;
                line-height: inherit;
                color: inherit;
                margin: 0;
                padding: 0;
            }

            .font-sans {
                font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            }

            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .grid {
                display: grid;
            }

            .flex {
                display: flex;
            }

            .justify-end {
                justify-content: flex-end;
            }

            .gap-2 {
                gap: 0.5rem;
            }

            .py-10 {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }

            .rounded-md {
                border-radius: 0.375rem;
            }

            .px-3 {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }

            .py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .text-black {
                --tw-text-opacity: 1;
                color: rgb(0 0 0 / var(--tw-text-opacity));
            }

            .ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
            }

            .ring-transparent {
                --tw-ring-color: transparent;
            }

            .transition {
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms;
            }

            .hover\:text-black\/70:hover {
                color: rgb(0 0 0 / 0.7);
            }

            .dark\:hover\:text-white\/80:hover {
                color: rgb(255 255 255 / 0.8);
            }

            .focus\:outline-none:focus {
                outline: 2px solid transparent;
                outline-offset: 2px;
            }

            .focus-visible\:ring-1:focus-visible {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
            }

            .dark\:focus-visible\:ring-white:focus-visible {
                --tw-ring-opacity: 1;
                --tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity));
            }

            /* Custom styles */
            .navbar {
                background: linear-gradient(to right, #1d002c, #2f2e8d);
                padding: 1rem 1rem;
                display: grid;
                grid-template-columns: 1fr 4fr;
                align-items: center;
            }
            .navbar .item-nav{
                display: flex;
                justify-content: end;
            }

            .navbar a {
                color: #ffffff;
                margin-right: .5rem;
                padding: 0.5rem 1rem;
                border-radius: 20px;
                transition: background-color 0.3s ease;
            }
            .navbar img{
                width: 80px;
            }

            .navbar a:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }

            .navbar .btn-login {
                background-color: #1d002c;
                border: 1px solid #1d002c;
            }

            .navbar .btn-login:hover {
                background-color: #252458;
            }

            .navbar .btn-register {
                background-color: #252458;
                border: 1px solid #252458;
            }

            .navbar .btn-register:hover {
                background-color: #1d002c;
            }

        h2 {
            color: #f2f0f7;
            font-weight: bold;
            font-size: 1.7rem;
            text-align: center;
            margin: 20px 0 10px 0;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin: 0 16px 0 16px;
        }

        .card {
            background-color: #252458;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 16px;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 0 1rem aqua;
        }

        .card-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .card-body {
            text-align: center;
        }

        .card-name {
            margin: 10px 0;
            font-size: 1.2em;
            color: #fcfbff;
        }

        .card-address {
            color: #d6cdcd;
        }

        .card-actions {
            margin-top: 10px;
        }

        .action-btn {
            display: inline-block;
            background-color: aqua;
            color: #252458;
            padding: 8px 20px;
            border-radius: 25px;
            margin: 0 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .action-btn:hover {
            background-color: #252458;
            color: aqua;
            box-shadow: 0 0 1rem aqua;
        }

        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
                align-items: center;
                margin: 0 16px;
            }

            .card {
                width: 90%;
                max-width: 500px;
            }

            .card-img {
                width: 80px;
                height: 80px;
            }
        }

        @media (max-width: 480px) {
            .card-container{
                grid-template-columns: 1fr;
            }
            .card-name {
                font-size: 1em;
            }

            .card-address {
                font-size: 0.9em;
            }

            .action-btn {
                padding: 6px 10px;
                font-size: 0.9em;
            }
        }
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <header class="navbar flex justify-end items-center">
            <img src="img/vanoise-capital.png" alt="">
            <div class="item-nav">
            @if (Route::has('login'))
                @auth
                @else
                    <a href="{{ route('login') }}" class="btn-login rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:focus-visible:ring-white">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-register rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:focus-visible:ring-white">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
        </header>

    <h2>DAFTAR SISWA</h2>

    <div class="card-container">
        @foreach ($siswas as $siswa)
        <div class="card">
            <img src="/images/{{ $siswa->foto }}" alt="Foto {{ $siswa->nama }}" class="card-img">
            <div class="card-body">
                <h3 class="card-name">{{ $siswa->nama }}</h3>
                <p class="card-address">{{ $siswa->alamat }}</p>
                <div class="card-actions">
                    <a href="{{ route('siswas.show', $siswa->id) }}" class="action-btn">Lihat</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </body>
</html>
