<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="stylesheet" href="css/root.css">
        <link rel="stylesheet" href="css/auth.css">
    </head>
    <body class="antialiased">
        @php
            $isRegister = request()->is('register');
            $isLogin = request()->is('login');
        @endphp

        <main class="w-screen h-screen flex flex-row items-center justify-center px-[32px]">
            @if ($isRegister)
                <div class="h-screen w-[50vw] flex flex-col justify-center items-center pt-6 sm:pt-0">
                    <div class="auth-box overflow-hidden rounded-[16px]" style="padding: 24px;">
                        {{ $slot }}
                    </div>
                </div>
                <div class="h-screen w-[50vw] flex flex-col items-center justify-center overflow-hidden">
                    <x-cover class="opacity-[0.5] h-screen object-cover"></x-cover>
                </div>
            @elseif ($isLogin)
                <div class="h-screen w-[50vw] flex flex-col items-center justify-center overflow-hidden">
                    <x-cover class="opacity-[0.5] h-screen object-cover scale-x-[-1]"></x-cover>
                </div>
                <div class="h-screen w-[50vw] flex flex-col justify-center items-center pt-6 sm:pt-0">
                    <div class="auth-box overflow-hidden rounded-[16px]" style="padding: 24px;">
                        {{ $slot }}
                    </div>
                </div>
            @else
                <div class="h-screen w-screen flex flex-col justify-center items-center pt-6 sm:pt-0">
                    <div class="fp-box overflow-hidden rounded-[16px]" style="padding: 24px;">
                        {{ $slot }}
                    </div>
                </div>
            @endif
        </main>
    </body>
</html>
