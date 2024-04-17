<!DOCTYPE html>
<html style="scroll-behavior: smooth;" class="bg-gray-200" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">


        @livewireStyles
    </head>
    <style>

    </style>
    <header class="bg-black">
        <div class="flex justify-center items-center">
            <div class="grid grid-cols-4 gap-x-20 mt-4 mb-16 gap-y-2 pb-2 border-b-2 px-32 text-sm">
                <a href="#" class="font-semibold" style="color: #5f4633">Home</a>
                <a href="#" class="text-white font-semibold">Catàleg</a>
                <a href="#" class="text-white font-semibold">Adkskjjk</a>
                <a href="#" class="text-white font-semibold">Informació</a>
            </div>
        </div>
    </header>




    <body class="">
        {{ $slot }}
    </body>
</html>
