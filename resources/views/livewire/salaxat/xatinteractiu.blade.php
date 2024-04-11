
<div class="w-full overflow-hidden">

    <div class="border-b flex flex-col overflow-y-scroll grow h-full">


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

            <div>
                <p>Total de xats relacionats amb aquest vídeo: {{ $xatsCount }}</p>
            </div>


            @foreach($xatsRelacionats ?? [] as $xat)
                <div class="p-4 border-b">
                    <!-- Mostrar detalles del chat aquí -->
                    <p><strong>ID:</strong> {{ $xat->id }}</p>
                    <p><strong>Nombre:</strong> {{ $xat->nom }}</p>
                    <p><strong>Descripción:</strong> {{ $xat->descripcio }}</p>
                    <p><strong>Media:</strong> {{ $xat->media_id }}</p>
                    <!-- Enlace para acceder al xat interactivo -->
                    <!-- Enlace para acceder al xat interactivo -->

                    <!-- Añadir más información del chat si es necesario -->
                    @if ($xat->url)
                        <p><strong>URL:</strong> <a href="{{ $xat->url }}" target="_blank">Enllaç</a></p>
                    @endif
                    @if ($xat->tipus)
                        <p><strong>Tipo:</strong> {{ $xat->tipus }}</p>
                    @endif
                    @if ($xat->privacitat)
                        <p><strong>Privacidad:</strong> {{ $xat->privacitat }}</p>
                    @endif


                </div>
            @endforeach





        </div>


    </header>


    {{-- body  --}}

    <main class="flex flex-col gap-3 p-2.5 overflow-y-auto  flex-grow overscroll-contain overflow-x-hidden w-full my-auto">


        <div @class([
                        'max-w-[85%] md:max-w-[78%] flex w-auto gap-2 relative mt-2',
                        'ml-auto']) >

            {{-- avatar --}}

{{--            <div @class([--}}
{{--                    'shrink-0',--}}
{{--                    'invisible'=>$previousMessage?->sender_id==$message->sender_id,--}}
{{--                    'hidden'=>$message->sender_id === auth()->id()--}}
{{--                        ])>--}}

{{--                <x-avatar/>--}}
{{--            </div>--}}


            {{-- messsage body --}}

            <div @class(['flex flex-wrap text-[15px]  rounded-xl p-2.5 flex flex-col text-black bg-[#f6f6f8fb]',
                         'rounded-bl-none border  border-gray-200/40 '=>false,
                         'rounded-br-none bg-blue-500/80 text-white'=>true
               ])>


                <p class="whitespace-normal truncate text-sm md:text-base tracking-wide lg:tracking-normal">
                    Loerem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias animi atque autem
                </p>


                <div class="ml-auto flex gap-2">

                    <p @class([
                    'text-xs ',
                    'text-gray-500'=>false,
                    'text-white'=>true,

                        ]) >
                        12:00 am


                    </p>


                    {{-- message status , only show if message belongs auth --}}


                    <div>

                        {{-- double ticks --}}

                        <span @class('text-gray-200')>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-check2-all" viewBox="0 0 16 16">
                                <path
                                    d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                            </svg>
                        </span>

                    </div>


                        {{-- single ticks --}}
                        {{--                                    <span @class('text-gray-200')>--}}
                        {{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">--}}
                        {{--                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>--}}
                        {{--                            </svg>--}}
                        {{--                        </span>--}}



                    </div>

                </div>

            </div>





    </main>


    {{-- send message  --}}

                    <footer class="shrink-0 z-10 bg-white inset-x-0">

                        <div class=" p-2 border-t">

                            <form

                                method="POST" autocapitalize="off">
                                @csrf

                                <input type="hidden" autocomplete="false" style="display:none">

                                <div class="grid grid-cols-12">
                                    <input
                                        type="text"
                                        autocomplete="off"
                                        autofocus
                                        placeholder="write your message here"
                                        maxlength="1700"
                                        class="col-span-10 bg-gray-100 border-0 outline-0 focus:border-0 focus:ring-0 hover:ring-0 rounded-lg  focus:outline-none"
                                    >

                                    <button class="col-span-2" type='submit'>Send
                                    </button>

                                </div>

                            </form>

                            @error('body')

                            <p> {{$message}} </p>

                            @enderror

                        </div>


                    </footer>

                </div>

            </div>

        </div>


</div>



