<div
    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl
dark:from-gray-700/50 dark:via-transparent border-b border-gray-200
dark:border-gray-700">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
                Category list
            </h1>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <x-button
                class="block rounded-md bg-indigo-600 px-3 py-2 text-center
text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
focus-visible:outline-indigo-600">
                <a href="{{ route('categories.create') }}">Create category</a>
            </x-button>
            </div>
        <livewire:categories />
    </div>
</div>
