@props(['id' => null])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sala xat medias') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class=" mx-auto sm:px-8 lg:px-56">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-customer.xatmedia :id="$id"/>

            </div>
        </div>
    </div>
</x-app-layout>
