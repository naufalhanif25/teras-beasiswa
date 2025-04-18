<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="stylesheet" href="css/root.css">
        <link rel="stylesheet" href="css/dashboard.css">
        @vite(['resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @include('layouts.navigation')

        <main class="min-h-screen w-screen">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <x-footer></x-footer>
    </body>
</html>
