@props(['id' => null])
<div
    class="bg-white dark:bg-gray-800 border-b border-gray-200
dark:border-gray-700">
    <div class="sm:flex sm:items-center ">
        <div class="sm:flex-auto bg-gray-200 pb-6">
            <h1 class="mt-8 text-2xl font-medium text-gray-900
dark:text-white pl-6 tracking-wide">
                {{ $id? 'Edició' : 'Creació' }} de categoria
            </h1>
        </div>
    </div>
    <livewire:categories.createorupdateCategories :id="$id" />
</div>
