<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="flex justify-center items-center h-screen !bg-[#0e82fd] px-6">
            <div class="md:w-[35vw] bg-white md:p-[3.5vw] sm:p-[4.5vw] xs:p-[5.5vw] md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
