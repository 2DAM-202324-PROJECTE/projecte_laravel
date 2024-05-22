<div class="w-full overflow-hidden">
    <div class="border-b flex flex-col grow h-full" id="message-container">
        {{-- header --}}
        <header class="w-full sticky top-0 z-10 bg-white border-b shadow">
            <div class="flex items-center justify-between max-w-5xl mx-auto p-4">
                <a class="shrink-0 lg:hidden" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"/>
                    </svg>
                </a>

                {{-- avatar --}}
                <div class="shrink-0">
                    <x-avatar class="h-9 w-9 lg:w-11 lg:h-11"/>
                </div>

                <h6 class="font-bold truncate"> {{$nom}} </h6>
            </div>
        </header>

        {{-- body  --}}
        <main class="flex flex-col gap-3 p-2.5  flex-grow overflow-x-hidden w-full my-auto"
              style="max-height: 500px;" id="message-body">
            @foreach($messages as $message)
                <div class="flex flex-col text-[15px] rounded-xl p-2.5 text-black bg-[#f6f6f8fb] mb-3">
                    <p class="whitespace-normal text-sm md:text-base tracking-wide lg:tracking-normal">
                        {{$message->sender->name}}: {{$message->body}}
                    </p>
                    <div class="ml-auto flex gap-2">
                        <p class="text-xs text-black">
                            12:00 am
                        </p>
                        <div>
                            <span class="text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-check2-all" viewBox="0 0 16 16">
                                    <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </main>

        {{-- send message  --}}
        <footer class="shrink-0 z-10 bg-white inset-x-0">
            <div class=" p-2 border-t">
                <form wire:submit.prevent="sendMessage" id="message-form">
                    @csrf

                    <input type="hidden" autocomplete="false" style="display:none">

                    <div class="grid grid-cols-12">
                        <input wire:model="missatge"
                               type="text"
                               autocomplete="off"
                               autofocus
                               placeholder="write your message here"
                               maxlength="1700"
                               class="col-span-10 bg-gray-100 border-0 outline-0 focus:border-0 focus:ring-0 hover:ring-0 rounded-lg  focus:outline-none"
                               id="message-input"
                        >

                        <button class="col-span-2" type='submit'>Send</button>
                    </div>
                </form>

                @error('body')
                <p> {{$message}} </p>
                @enderror
            </div>
        </footer>
    </div>

    <script>
        var messageContainer = document.getElementById('message-body');

        function scrollDown() {
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }

        document.getElementById('message-form').addEventListener('submit', function() {
            scrollDown();
        });
    </script>

</div>
