<div class="antialiased sans-serif bg-gray-200 h-screen">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

    <div class="container mx-auto py-6 px-4">
        <h1 class="text-3xl py-4 border-b mb-10">Customers</h1>

        <!-- Buttons -->
        <div class="mb-4 flex grid-rows gap-x-2 justify-end">
            <!-- Add buttons for creating, updating, and deleting customers -->
        </div>

        <!-- Search bar -->
        <div class="mb-4">
            <input wire:model.debounce.300ms="search" type="text" class="w-full border px-3 py-2 mb-2 rounded-lg"
                   placeholder="Search by name or email...">
            <button class="px-3 py-2 bg-indigo-600 text-white rounded-md ml-2" wire:click="executeSearch">Search
            </button>
        </div>

        <!-- Index table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative" style="height: 550px;">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                <!-- Table header -->
                <thead>
                <tr class="text-left">
                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                        <input type="checkbox"
                               class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline rounded"
                               wire:click="selectAll">
                    </th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                        Customer ID
                    </th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                        Name
                    </th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                        Email
                    </th>
                    <!-- Add more columns as needed -->
                </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                @foreach ($customers as $customer)
                    <tr class="hover:bg-gray-50">
                        <!-- Checkbox column -->
                        <td class="border-dashed border-t border-gray-200 px-3">
                            <input type="checkbox"
                                   class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline rounded"
                                   wire:model.live="selectedRows" value="{{ $customer->id }}">
                        </td>
                        <!-- Index ID column -->
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">{{ $customer->id }}</span>
                        </td>
                        <!-- Name column -->
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">{{ $customer->name }}</span>
                        </td>
                        <!-- Email column -->
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">{{ $customer->email }}</span>
                        </td>
                        <!-- Add more columns as needed -->
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Pagination -->
            {{ $customers->links() }}
        </div>
    </div>
</div>

