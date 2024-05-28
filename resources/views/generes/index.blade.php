<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Llista de les gèneres') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class=" mx-auto sm:px-8 lg:px-56">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl
sm:rounded-lg">
                <x-generes />
            </div>
        </div>
    </div>
</x-app-layout>
