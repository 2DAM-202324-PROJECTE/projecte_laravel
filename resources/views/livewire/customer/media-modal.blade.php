<div x-data="{ open: {{ $isModalVisible ? 'true' : 'false' }} }" @keydown.escape.window="open = false; $dispatch('closeModal')">
    <div class="fixed z-10 inset-0 overflow-y-auto bg-gray-500 bg-opacity-25" aria-labelledby="modal-title"
         role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="inset-0 transition-opacity" aria-hidden="true">
                <div class="inset-0 bg-black opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-black rounded-lg text-left shadow-xl transform transition-all border-gray-900 border-4 sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4" style="background: #553d2a"
                    @click.away="open = false; $dispatch('closeModal')">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-100" id="modal-title">
                                {{ $media->name }}
                            </h3>
                            <div class="mt-2">
                                <img class="my-4" src="{{ $media->image_uri }}" alt="{{ $media->name }}"/>
                                <p class="text-sm text-gray-300">
                                    {{ $media->description }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Duration: {{ $media->duration }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse" style="background: #907761">
                    <!-- Close button -->
                    <button type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-800 text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click="$dispatch('closeModal')">
                        <!-- X icon -->
                        <svg class="w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="inline-block align-middle" style="padding-top: 3px;">Tanca</span>
                    </button>
                    <!-- Host chatroom button -->
                    <button type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click="hostChatroom">
                        <span class="inline-block align-middle" style="padding-top: 3px;">Obrir una sala de xat</span>
                    </button>
                    <!-- Join Chatroom button -->
                    <button type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click="joinChatroom">
                        <span class="inline-block align-middle" style="padding-top: 3px;">Unir-se a una sala de xat</span>
                    </button>
                    <button type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-700
                            text-base font-medium text-white hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click="playMedia">
                        <!-- Play icon -->
                        <svg class="w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 18V6l8 6-8 6Z"/>
                        </svg>
                        <span class="inline-block align-middle" style="padding-top: 3px;">Reproduir</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



