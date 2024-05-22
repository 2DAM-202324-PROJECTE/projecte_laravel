@props(['id' => null])
<x-customer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Sala xat medias') }}
        </h2>
    </x-slot>
    <div class="">
        <div class="my-32 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-customer.xatmedia :id="$id"/>
            </div>
        </div>
    </div>
</x-customer-layout>
