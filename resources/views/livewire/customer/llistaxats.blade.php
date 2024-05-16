<div>
    <div class="m-4 pb-12 ">
        <style>
            .first {
                transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
            }
            .first:hover {
                box-shadow: 0 0 40px 40px red inset;
            }
            .btn {
                box-sizing: border-box;
                appearance: none;
                background-color: transparent;
                border: 2px solid red;
                border-radius: 0.6em;
                color: red;
                cursor: pointer;
                display: flex;
                align-self: center;
                font-size: 14px;
                font-weight: 400;
                line-height: 1;
                margin: 20px;
                padding: 0.8em 1.5em;
                text-decoration: none;
                text-align: center;
                text-transform: uppercase;
                font-family: 'Montserrat', sans-serif;
            }
            .btn:hover,
            .btn:focus {
                color: #fff;
                outline: 0;
            }
            .animated {
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }

            .animated.faster {
                -webkit-animation-duration: 500ms;
                animation-duration: 500ms;
            }

            .fadeIn {
                -webkit-animation-name: fadeIn;
                animation-name: fadeIn;
            }

            .fadeOut {
                -webkit-animation-name: fadeOut;
                animation-name: fadeOut;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @keyframes fadeOut {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                }
            }
            .btn.active {
                background-color: red;
                color: white;
            }
        </style>
        <div class="mt-6 items-center">
            <h1 class="text-white text-center text-xl">SALES DE XAT DISPONIBLES</h1>
            <button id="showChatsButton" class="btn first text-white text-end text-base hover:text-gray-600 {{ $myChatsVisible ? 'bg-white' : '' }}">Les meves sales de xat</button>
        </div>
        <div class="mb-12 ">
            <button onclick="openModal()" class="btn first">
                Entrar a sala privada
            </button>
        </div>
        <div id="myChats" class="hidden">
            @foreach($xats2 as $xat)
                <a href="{{ route('customer.xatmedia', ['id' => $xat->id]) }}" style="outline: none; text-decoration: none;">
                    <div class="movie flex-shrink-0 hover:bg-gray-800  p-4 md:p-2 border border-gray-800 rounded-md bg-gray-800 mb-2">
                        <div class="flex gap-x-50 p-2 grid-rows-2 rounded-lg relative">
                            <p class="text-gray-600 mt-8 justify-start text-lg">{{$xat->nom}}</p>
                            <p class="text-center text-sm absolute bottom-2 mt-2 left-2 hover:text-gray-200 flex">{{$xat->idioma}}</p>
                            <div style="outline: none" class="flex justify-end">
                                <img class="justify-end h-auto w-2/5 sm:w-2/5 md:w-2/6 lg:w-2/12" src="https://previews.123rf.com/images/bahtiarmaulana/bahtiarmaulana2204/bahtiarmaulana220400040/185159316-rebanada-de-dibujos-animados-de-pizza-ilustraci%C3%B3n-de-dibujos-animados-vectoriales-im%C3%A1genes.jpg">
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div id="chatRooms" class="">
            @foreach($xats as $xat)
                <a href="{{ route('customer.xatmedia', ['id' => $xat->id]) }}" style="outline: none; text-decoration: none;">
                    <div class="movie flex-shrink-0 hover:bg-gray-800 p-4 md:p-2 border border-gray-800 rounded-md bg-gray-800 mb-2">
                        <div class=" gap-x-50 p-2 grid-rows-2 rounded-lg relative">
                            <p class="text-gray-600 md:text-center text-lg">{{$xat->nom}}</p>
                            <p class="text-center text-sm absolute bottom-2 mt-2 left-2 hover:text-gray-200 flex">{{$xat->idioma}}</p>
                            <div style="outline: none; display: flex; justify-content: flex-end;">
                                <img class="h-auto w-2/5 sm:w-2/5 md:w-1/5 lg:w-1/12" src="https://previews.123rf.com/images/bahtiarmaulana/bahtiarmaulana2204/bahtiarmaulana220400040/185159316-rebanada-de-dibujos-animados-de-pizza-ilustraci%C3%B3n-de-dibujos-animados-vectoriales-im%C3%A1genes.jpg">
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
             style="background: rgba(0,0,0,.7);">
            <div
                class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Introdueix URL de la sala</p>
                        <div class="modal-close cursor-pointer z-50">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                 viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <!--Body-->
                    <div class="my-5">
                        <div>
                            <label for="urlInput" class="block text-sm text-gray-500 dark:text-gray-300">URL</label>
                            <input id="urlInput" type="text" placeholder="http/.." class="block mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-red-400 bg-white px-5 py2.5 text-gray-700 focus:border-red-400 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-40 dark:border-red-400 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-red-300" />
                            <p class="mt-3 text-xs text-red-400">Ha d'existir.</p>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <button class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel·lar</button>
                        <button id="confirmButton" class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const modal = document.querySelector('.main-modal');
            const closeButton = document.querySelectorAll('.modal-close');

            const modalClose = () => {
                modal.classList.remove('fadeIn');
                modal.classList.add('fadeOut');
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 500);
            }

            const openModal = () => {
                modal.classList.remove('fadeOut');
                modal.classList.add('fadeIn');
                modal.style.display = 'flex';
            }

            for (let i = 0; i < closeButton.length; i++) {

                const elements = closeButton[i];

                elements.onclick = (e) => modalClose();

                modal.style.display = 'none';

                window.onclick = function (event) {
                    if (event.target == modal) modalClose();
                }
            }
            document.getElementById('confirmButton').addEventListener('click', function() {
                const url = document.getElementById('urlInput').value;
                if (url) {
                    window.location.href = url;
                } else {
                    alert('Por favor, iintrodueix url vàlida.');
                }
            });


            let myChatsVisible = false;

            document.getElementById('showChatsButton').addEventListener('click', function() {
                const button = document.getElementById('showChatsButton');

                if (myChatsVisible) {
                    document.getElementById('chatRooms').classList.remove('hidden');
                    document.getElementById('myChats').classList.add('hidden');
                    myChatsVisible = false;
                    button.classList.remove('active'); // Remover la clase activa
                } else {
                    document.getElementById('chatRooms').classList.add('hidden');
                    document.getElementById('myChats').classList.remove('hidden');
                    myChatsVisible = true;
                    button.classList.add('active'); // Agregar la clase activa
                }
            });
        </script>
    </div>
</div>
