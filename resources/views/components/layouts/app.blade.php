<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="font-family:Figtree, sans-serif; scroll-behavior: smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Page Title' }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@2.8.2/dist/alpine.min.js"></script>

    <!-- Styles -->
    @livewireStyles
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Manrope:wght@200..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
</style>
<body class="antialiased">
<x-banner />

<div class="bg-gray-100">
    <!-- Page Heading -->
    <header class="bg-black">
        <div class="flex justify-center items-center border">
            <div class="grid grid-cols-4 gap-x-20 mt-4 mb-16 gap-y-2 pb-2 border-b-2 px-32 text-base tracking-wide">
                <a href="#" class="font-semibold" style="color: #5f4633">Home</a>
                <a href="#" class="text-white font-semibold">Catàleg</a>
                <a href="#" class="text-white font-semibold">Adkskjjk</a>
                <a href="#" class="text-white font-semibold">Informació</a>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

</div>

@livewireScripts
</body>
</html>
