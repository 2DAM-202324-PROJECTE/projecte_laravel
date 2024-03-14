<!DOCTYPE html>
<html class="bg-gray-200" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 xl:h-10 xl:w-10
            mt-8 ml-4 group flex cursor-pointer items-center justify-center rounded-xl bg-white p-2 p hover:bg-slate-200"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 data-ripple-light="true"
                 data-popover-target="menu">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
        </div>
            <ul
                role="menu"
                data-popover="menu"
                data-popover-placement="bottom"
                class="ml-2 absolute z-10 min-w-[180px] overflow-auto rounded-md border border-blue-gray-50 bg-white p-3 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none"
            >
                <li
                    role="menuitem"
                    class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
                >
                    <a href="/xats" target="_blank">Xats</a>
                </li>
                <li
                    role="menuitem"
                    class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
                >
                    <a href="/medias" target="_blank">Media</a>
                </li>
                <li
                    role="menuitem"
                    class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
                >
                    <a href="/categories" target="_blank">Categories</a>
                </li>
            </ul>

        <div class="flex justify-end">
            <p>
                a
            </p>
            <p>
                a
            </p>
        </div>


            <!-- stylesheet -->
            <link
                rel="stylesheet"
                href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
            />

            <!-- from cdn -->
            <script
                type="module"
                src="https://unpkg.com/@material-tailwind/html@latest/scripts/popover.js"
            ></script>

            <!-- from cdn -->
            <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
        {{ $slot }}
    </body>
</html>
