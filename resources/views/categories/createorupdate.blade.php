@props(['id' => null])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200
leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl
sm:rounded-lg">
                <x-categories.createorupdate :id="$id"/>
            </div>
        </div>
    </div>
</x-app-layout>
