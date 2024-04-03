<div class="antialiased sans-serif bg-gray-200 h-screen">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

    <div class="container mx-auto py-6 px-4">
        <h1 class="text-3xl py-4 border-b mb-10">Medias</h1>

        <!-- Buttons -->
        <div class="mb-4 flex grid-rows gap-x-2 justify-end">
            @if (empty($selectedRows))
                <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center
            text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
            focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
            focus-visible:outline-indigo-600" style="outline: none" wire:click="cridaSave">Crear</button>
            @endif
            @if (!empty($selectedRows))
                <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center
            text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
            focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
            focus-visible:outline-indigo-600" style="outline: none" wire:click="delete">Eliminar</button>
            @endif
            @if (count($selectedRows) === 1)
                <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center
            text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
            focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
            focus-visible:outline-indigo-600" style="outline: none" wire:click="cridaUpdate({{ $selectedRows[0] }})">Modificar</button>
            @endif
        </div>

        <!-- Search bar -->
        <div class="mb-4">
            <input wire:model.debounce.300ms="search" type="text" class="w-full border px-3 py-2 mb-2 rounded-lg" placeholder="Search by name or description...">
            <button class="px-3 py-2 bg-indigo-600 text-white rounded-md ml-2" wire:click="executeSearch">Search</button>
        </div>


        <!-- Media table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative" style="height: 550px;">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                <!-- Table header -->
                <thead>
                <tr class="text-left">
                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                        <input type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline rounded" wire:click="selectAll">
                    </th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                        Media ID</th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                        Name</th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                        Description</th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                        Path</th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                        Category</th>
                </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                @foreach ($medias as $media)
                    <tr class="hover:bg-gray-50">
                        <td class="border-dashed border-t border-gray-200 px-3">
                            <input type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline rounded" wire:model.live="selectedRows" value="{{ $media->id }}">
                        </td>
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">
                                {{ $media->id }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">
                                {{ $media->name }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">
                                {{ $media->description }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">
                                {{ $media->path }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">
                                {{ $media->category ? $media->category->name : 'N/A' }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Pagination -->
            {{ $medias->links() }}
        </div>
    </div>
</div>





