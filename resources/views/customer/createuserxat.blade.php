@props(['id' => null])

<x-customer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear o Editar Xat') }} <!-- Cambia el título según sea necesario -->
        </h2>
    </x-slot>

    <div class="">
        <div class="">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Aquí cargamos el componente de Livewire -->
                <x-customer.createuserxat :id="$id"/> <!-- Asegúrate de que la ruta del componente es correcta -->
            </div>
        </div>
    </div>
</x-customer-layout>
