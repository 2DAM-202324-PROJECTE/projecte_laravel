@props(['id' => null])

<x-customer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear o Editar Xat') }}
        </h2>
    </x-slot>

    <div>
        <div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:customer.createuserxat :id="$id" />
            </div>
        </div>
    </div>
</x-customer-layout>
