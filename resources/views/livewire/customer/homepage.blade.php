<div class="bg-gray-900" style="">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');        @keyframes bounce {

            $fuschia: #ff0081;
            $button-bg: $fuschia;
            $button-text-color: #fff;
            $baby-blue: #f8faff;
            0%,20%,50%,80%,to {
                transform: translateZ(-2px) translateY(5px)
            }

            40% {
                transform: rotateY(180deg) translateZ(-2px) translateY(-35px)
            }

            60% {
                transform: translateZ(-2px) translateY(-25px)
            }
        }
        img {
            -webkit-filter: sepia(100%);
            filter: sepia(100%);
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        img:hover {
            -webkit-filter: sepia(0);
            filter: sepia(0);
            transform: scale(1.05);
            padding-left: 4px;
            padding-right: 4px;
            padding-top: 4px;
        }

        #documentalsContainer {
            display: none; /* Inicialmente ocultos */
            scroll-behavior: smooth;
            overflow-x: hidden;
            white-space: nowrap;
        }
        #pelisContainer {
            scroll-behavior: smooth;
            overflow-x: hidden;
            white-space: nowrap;
        }

        .documental, .movie {
            width: 270px;
            margin-right: 20px;
            display: inline-block;
        }
        #titol{
            font-size: 3rem;
            line-height: 80%;
            transform: rotateX(0) rotateY(-25deg);
            text-transform: uppercase;
            width: 500px;
            color: #fff;
            font-family: "Kanit", sans-serif;
            position: relative;
            letter-spacing: 3px;
            text-shadow: 0 0 5px #fff,0 0 10px #fff,0 0 15px #228dff,0 0 20px #fff,0 0 35px #228dff,0 0 40px #228dff;
        }
        .bubbly-button{
            font-family: 'Helvetica', 'Arial', sans-serif;
            display: inline-block;
            font-size: 1em;
            padding: 1em 2em;
            -webkit-appearance: none;
            appearance: none;
            background-color: $button-bg;
            color: $button-text-color;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            position: relative;
            transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
            box-shadow: 0 2px 25px rgba(255, 0, 130, 0.5);

            &:focus {
                outline: 0;
            }

            &:before, &:after{
                position: absolute;
                content: '';
                display: block;
                width: 140%;
                height: 100%;
                left: -20%;
                z-index: -1000;
                transition: all ease-in-out 0.5s;
                background-repeat: no-repeat;
            }

            &:before{
                display: none;
                top: -75%;
                background-image:
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle,  transparent 20%, $button-bg 20%, transparent 30%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle,  transparent 10%, $button-bg 15%, transparent 20%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%);
                background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%, 10% 10%, 18% 18%;
            //background-position: 0% 80%, -5% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 85% 30%;
            }

            &:after{
                display: none;
                bottom: -75%;
                background-image:
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle,  transparent 10%, $button-bg 15%, transparent 20%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%),
                    radial-gradient(circle, $button-bg 20%, transparent 20%);
                background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 10% 10%, 20% 20%;
            //background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
            }

            &:active{
                transform: scale(0.9);
                background-color: darken($button-bg, 5%);
                box-shadow: 0 2px 25px rgba(255, 0, 130, 0.2);
            }

            &.animate{
                &:before{
                    display: block;
                    animation: topBubbles ease-in-out 0.75s forwards;
                }
                &:after{
                    display: block;
                    animation: bottomBubbles ease-in-out 0.75s forwards;
                }
            }
        }


        @keyframes topBubbles {
            0%{
                background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
            }
            50% {
                background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 90% 30%;}
            100% {
                background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%, 50% 40%, 65% 10%, 90% 20%;
                background-size: 0% 0%, 0% 0%,  0% 0%,  0% 0%,  0% 0%,  0% 0%;
            }
        }

        @keyframes bottomBubbles {
            0%{
                background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%, 70% -10%, 70% 0%;
            }
            50% {
                background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%, 105% 0%;}
            100% {
                background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%, 110% 10%;
                background-size: 0% 0%, 0% 0%,  0% 0%,  0% 0%,  0% 0%,  0% 0%;
            }
        }
        .btn:link,
        .btn:visited {
            text-transform: uppercase;
            text-decoration: none;
            padding: 15px 40px;
            display: inline-block;
            border-radius: 100px;
            transition: all .2s;
            position: absolute;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .btn:active {
            transform: translateY(-1px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-white {
            background-color: #fff;
            color: #777;
        }

        .btn::after {
            content: "";
            display: inline-block;
            height: 100%;
            width: 100%;
            border-radius: 100px;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            transition: all .4s;
        }

        .btn-white::after {
            background-color: #fff;
        }

        .btn:hover::after {
            transform: scaleX(1.4) scaleY(1.6);
            opacity: 0;
        }

        .btn-animated {
            animation: moveInBottom 5s ease-out;
            animation-fill-mode: backwards;
        }

        @keyframes moveInBottom {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0px);
            }
        }

        /* Media Query para pantallas pequeñas */
        @media (max-width: 1080px) {
            #iconos {
                flex-wrap: wrap; /* Permite que los elementos se envuelvan en varias líneas */
            }

            #iconos > div {
                /* Ancho del 50% menos el espaciado entre elementos */
                margin: 0.5rem; /* Espacio entre los elementos */
            }
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <link rel="stylesheet" href="/resources/css/customer/home-page.css">
    <div class="pb-32 ">
        <div class="px-10 shadow-xl py-12" >
            <h2 id="titol" class="mb-4">HOME PAGE</h2>
            <p class="text-white ml-6 mt-6 text-xl font-semibold" style="font-family: 'Kanit', serif; color: #D6EAF8">HOLA JOSEPITA NOSE</p>
        </div>
        <div class="mx-12 flex flex-row justify-between pb-20 pt-16 mt-12">
            <p class="text-start text-white text-xl mr-4 tracking-wider font-semibold">NOVETATS AFEGIDES!</p>
            <div class="flex justify-end md:ml-32 md:gap-x-20 gap-x-12 sm:ml-4 sm:mr-12 lg:mr-32 md:mr-28">
                <button class="text-end font-semibold tracking-wide text-md bubbly-button" style="color: #FF297D" onclick="togglePelisContainer()">PEL·LÍCULES</button>
                <button class="text-end font-semibold tracking-wide text-md bubbly-button" style="color: #FF297D" onclick="toggleDocumentalsContainer()">DOCUMENTALS</button> <!-- Modificado -->
            </div>
        </div>
        <div id="pelisContainer" class="mt-12 px-4 overflow-hidden flex rounded-lg sm:px-12 lg:px-6 py-4 mb-20 sm:mx-24 md:mx-40">
            @foreach($pelis as $peli)
                <div class="movie flex-shrink-0 p-4 md:p-2 border border-gray-800 rounded-md bg-gray-800 text-center">
                    <button wire:click="showOrHideModal({{ $peli['id'] }})">
                        <div class="flex justify-center items-center h-full"> <!-- Agregamos un contenedor flexbox para centrar verticalmente -->
                            <img class="rounded-md shadow-lg max-h-170" src="{{ $peli['image_uri'] }}" alt="{{ $peli['name'] }}" /> <!-- Ajusta el tamaño máximo de la imagen aquí -->
                        </div>
                    </button>
                    <p class="text-sm flex justify-center mt-2 text-gray-200 font-medium movie-name" style="font-family: 'Biryani', sans-serif;">{{ $peli['name'] }}</p>
                </div>
            @endforeach
            @if($isModalVisible)
                <livewire:customer.media-modal :mediaId="$modalMediaId"/>
            @endif
        </div>

        <div id="documentalsContainer" class="mt-12 px-4 overflow-hidden flex rounded-lg sm:px-12 lg:px-6 py-4 mb-40 sm:mx-24 md:mx-40">
            @foreach($documentals as $documental)
                <div class="documental flex-shrink-0 p-4 md:p-2 border border-gray-800 rounded-md bg-gray-800 text-center">
                    <button wire:click="showOrHideModal({{ $documental['id'] }})">
                        <div class="flex justify-center items-center h-full"> <!-- Agregamos un contenedor flexbox para centrar verticalmente -->
                            <img class="rounded-md shadow-lg max-h-170" src="{{ $documental['image_uri'] }}" alt="{{ $documental['name'] }}" /> <!-- Ajusta el tamaño máximo de la imagen aquí -->
                        </div>
                    </button>
                    <p class="text-sm flex justify-center mt-2 text-gray-200 font-medium documental-name" style="font-family: 'Biryani', sans-serif;">{{ $documental['name'] }}</p>
                </div>
            @endforeach
            @if($isModalVisible)
                <livewire:customer.media-modal :mediaId="$modalMediaId"/>
            @endif
        </div>

        <div id="iconos" class="mt-24 flex justify-center gap-x-56 mx-12 items-center pb-12">
            <div class="border btn btn-white btn-animated rounded-full flex justify-center items-center" style="background: #F9F9F9">
                <svg class=" px-6 py-4" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="90" height="90"  xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                    <g>
                        <g>
                            <g>
                                <path fill="#EAEAEA" d="M32,0c17.7,0,32,14.3,32,32S49.7,64,32,64S0,49.7,0,32S14.3,0,32,0z"></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path fill="#3E80C1" d="M38.5,23.1c8.8,0,16,5.4,16,12c0,2.9-1.4,5.6-3.7,7.7c0.3,1,0.8,2.3,1.8,3.5c0.6,0.7,0,1.7-0.9,1.6
                                    c-3-0.3-5.4-1.1-7.1-1.8c-1.9,0.6-4,0.9-6.2,0.9c-8.8,0-16-5.4-16-12C22.5,28.5,29.7,23.1,38.5,23.1z"></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path fill="#60A1EF" d="M25.5,16c-8.8,0-16,5.4-16,12c0,2.9,1.4,5.6,3.7,7.7c-0.3,1-0.8,2.3-1.8,3.5c-0.6,0.7,0,1.7,0.9,1.6
                                    c3-0.3,5.4-1.1,7.1-1.8c1.9,0.6,4,0.9,6.2,0.9c8.8,0,16-5.4,16-12C41.5,21.4,34.3,16,25.5,16z"></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle fill="#FFFFFF" cx="18.5" cy="28" r="2"></circle>
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle fill="#FFFFFF" cx="25.5" cy="28" r="2"></circle>
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle fill="#FFFFFF" cx="32.5" cy="28" r="2"></circle>
                            </g>
                        </g>
                    </g>
                </svg>

            </div>
            <a href="{{ route('catalegPelis') }}">
                <div class="border btn btn-white btn-animated rounded-full" style="background: #F9F9F9">
                    <svg class="my-2 px-4 py-4" xmlns="http://www.w3.org/2000/svg" width="90" height="70" viewBox="0 0 24 24">
                        <title>movie-film-1</title>
                        <g id="Duotone">
                            <polygon points="20.5 18 10.5 23.5 0.5 18 0.5 7 10.5 1.5 20.5 7 20.5 18" fill="#fff"></polygon>
                            <path d="M11.468,11.968,12,12.5,10.5,14l-.968-.968L.5,18l10,5.5,10-5.5V7ZM12.5,19.25l-2,1.25-2-1.25v-2l2-1.25,2,1.25Zm4.75-4.75h-2L14,12.5l1.25-2h2l1.25,2Z" fill="#cce7ff"></path>
                            <line x1="10.5" y1="23.5" x2="16.5" y2="23.5" fill="none" stroke="#1078ff" stroke-linecap="round" stroke-linejoin="round"></line>
                            <polygon points="8.5 5.75 10.5 4.5 12.5 5.75 12.5 7.75 10.5 9 8.5 7.75 8.5 5.75" fill="none" stroke="#1078ff" stroke-linejoin="round"></polygon>
                            <polygon points="3.75 14.5 2.5 12.5 3.75 10.5 5.75 10.5 7 12.5 5.75 14.5 3.75 14.5" fill="none" stroke="#1078ff" stroke-linejoin="round"></polygon>
                            <polygon points="8.5 17.25 10.5 16 12.5 17.25 12.5 19.25 10.5 20.5 8.5 19.25 8.5 17.25" fill="none" stroke="#1078ff" stroke-linejoin="round"></polygon>
                            <polygon points="15.25 14.5 14 12.5 15.25 10.5 17.25 10.5 18.5 12.5 17.25 14.5 15.25 14.5" fill="none" stroke="#1078ff" stroke-linejoin="round"></polygon>
                            <rect x="9.439" y="11.439" width="2.121" height="2.121" transform="translate(-5.763 11.086) rotate(-45)" fill="none" stroke="#1078ff" stroke-linecap="round" stroke-linejoin="round"></rect>
                            <line x1="18.5" y1="23.5" x2="19.5" y2="23.5" fill="none" stroke="#1078ff" stroke-linecap="round" stroke-linejoin="round"></line>
                            <line x1="21.5" y1="23.5" x2="22.5" y2="23.5" fill="none" stroke="#1078ff" stroke-linecap="round" stroke-linejoin="round"></line>
                            <polygon points="20.5 18 10.5 23.5 0.5 18 0.5 7 10.5 1.5 20.5 7 20.5 18" fill="none" stroke="#1078ff" stroke-linejoin="round"></polygon>
                        </g>
                        <g id="Frames-24px">
                            <rect width="24" height="24" fill="none"></rect>
                        </g>
                    </svg>
                </div>
            </a>
            <a href="https://2dam-202324-projecte.github.io/ProjecteTeamFlick/index.html">
                <div class="border btn btn-white btn-animated rounded-full" style="background: #F9F9F9">
                    <svg class="my-2 py-4 px-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="90" height="70" viewBox="0 0 64.142 63.929">
                        <defs>
                            <clipPath id="clip-path">
                                <path id="Rectangle_127" data-name="Rectangle 127" d="M0,24.008,24,0,48,24.008V52H0Z" fill="#ecf0f1"></path>
                            </clipPath>
                        </defs>
                        <g id="house" transform="translate(0.071 -0.071)">
                            <g id="Rectangle_127_Rectangle_132" data-name="Rectangle 127 + Rectangle 132" transform="translate(8 12)">
                                <path id="Rectangle_127-2" data-name="Rectangle 127" d="M0,24.008,24,0,48,24.008V52H0Z" fill="#ecf0f1"></path>
                                <g id="Rectangle_127_Rectangle_132-2" data-name="Rectangle 127 + Rectangle 132" clip-path="url(#clip-path)">
                                    <path id="Rectangle_132" data-name="Rectangle 132" d="M63.868,64C58.041,44.86,41.186,32,21.926,32A42.579,42.579,0,0,0,0,38.1V0H88V64H63.868Z" transform="translate(-22 -12)" fill="rgba(189,195,199,0.4)"></path>
                                </g>
                            </g>
                            <rect id="Rectangle_130" data-name="Rectangle 130" width="14" height="2" transform="translate(14 62)" fill="#bdc3c7"></rect>
                            <path id="Rectangle_131" data-name="Rectangle 131" d="M2,0H8a2,2,0,0,1,2,2V16a0,0,0,0,1,0,0H0a0,0,0,0,1,0,0V2A2,2,0,0,1,2,0Z" transform="translate(16 46)" fill="#e87e03"></path>
                            <rect id="Rectangle_134" data-name="Rectangle 134" width="2" height="4" transform="translate(22 52)" fill="#f2c500"></rect>
                            <rect id="Rectangle_133" data-name="Rectangle 133" width="4" height="10" transform="translate(46 8)" fill="#bdc3c7"></rect>
                            <path id="Rectangle_128" data-name="Rectangle 128" d="M3.338,35.622h0L-.071,32.213,32.071.071l32,32L60.662,35.48,32.071,6.89Z" fill="#e94b35"></path>
                            <rect id="Rectangle_135" data-name="Rectangle 135" width="10" height="14" rx="2" transform="translate(36 40)" fill="#fff"></rect>
                        </g>
                    </svg>
                </div>
            </a>
            <div class="border btn btn-white btn-animated rounded-full" style="background: #F9F9F9">
                <svg class="my-2 py-4 px-4" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="90" height="70" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill:#607D8B;}
                        .st1{fill:#ECEFF1;}
                        .st2{fill:#FAFAFA;}
                    </style>
                                        <path class="st0" d="M256,0C114.8,0,0,114.8,0,256s114.8,256,256,256s256-114.8,256-256S397.2,0,256,0z"></path>
                                        <path class="st1" d="M277.3,384c0,11.8-9.6,21.3-21.3,21.3s-21.3-9.6-21.3-21.3s9.6-21.3,21.3-21.3S277.3,372.2,277.3,384z"></path>
                                        <path class="st2" d="M289.8,269.7c-7.6,3.5-12.4,11.1-12.4,19.4v9.6c0,11.8-9.5,21.3-21.3,21.3s-21.3-9.6-21.3-21.3v-9.6
                        c0-24.9,14.6-47.7,37.2-58.2c21.7-10,37.4-36.6,37.4-49.6c0-29.4-23.9-53.3-53.3-53.3s-53.3,23.9-53.3,53.3
                        c0,11.8-9.5,21.3-21.3,21.3s-21.3-9.6-21.3-21.3c0-52.9,43.1-96,96-96s96,43.1,96,96C352,210.2,327,252.5,289.8,269.7z"></path>
                    </svg>
            </div>
        </div>
        <div class="flex justify-center items-center mt-32 pb-48">
            <div class="border border-gray-600 px-12 mx-20 rounded-md">
                <p class="text-white text-center p-4 font-semibold tracking-widest text-xl mb-12">SALES DE CHATS MÉS RECENTS</p>
                <div class="grid grid-cols-1 justify-center">
                    @foreach(array_slice($xats, 0, 4) as $xat)
                        <a href="{{ route('customer.xatmedia', ['id' => $xat->id]) }}" style="outline: none; text-decoration: none;">
                            <div class="mb-8 bg-gray-100 flex-shrink-0 gap-x-50 p-2 hover:bg-gray-800 grid-rows-2 rounded-lg relative">
                                <p class="text-gray-600 text-center text-lg">{{$xat->nom}}</p>
                                <p class="text-center text-sm absolute bottom-2 mt-2 left-2 hover:text-gray-200 flex">{{$xat->idioma}}</p>
                                <div class="absolute top-0 right-0 mb-2">
                                    <div class="h-6 w-6 absolute bg-green-500 rounded-full animate-pulse"></div>
                                </div>
                                <div style="outline: none" class="flex justify-end">
                                    <img class="justify-end h-auto w-2/5 sm:w-2/5 md:w-2/6 lg:w-2/12" src="https://previews.123rf.com/images/bahtiarmaulana/bahtiarmaulana2204/bahtiarmaulana220400040/185159316-rebanada-de-dibujos-animados-de-pizza-ilustraci%C3%B3n-de-dibujos-animados-vectoriales-im%C3%A1genes.jpg">
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            const pelisContainer = document.getElementById('pelisContainer');
            const documentalsContainer = document.getElementById('documentalsContainer');

            function togglePelisContainer() {
                pelisContainer.style.display = 'block';
                documentalsContainer.style.display = 'none';
                document.getElementById('documentalsLink').style.pointerEvents = 'auto'; // Habilita el enlace a documentales
                document.getElementById('pelisLink').style.pointerEvents = 'none'; // Deshabilita el enlace a películas
            }

            function toggleDocumentalsContainer() {
                documentalsContainer.style.display = 'block';
                pelisContainer.style.display = 'none';
                document.getElementById('pelisLink').style.pointerEvents = 'auto'; // Habilita el enlace a películas
                document.getElementById('documentalsLink').style.pointerEvents = 'none'; // Deshabilita el enlace a documentales
            }


            const movies = pelisContainer.querySelectorAll('.movie');
            let currentIndexMovies = 0;

            function showNextMovie() {
                const nextIndex = (currentIndexMovies + 1) % movies.length;
                const nextMovie = movies[nextIndex];
                pelisContainer.scrollLeft += nextMovie.offsetWidth + 200;
                currentIndexMovies = nextIndex;
                if (nextIndex === 0) {
                    pelisContainer.scrollLeft = 0;
                }
            }


            setInterval(showNextMovie, 2000);

            const documentals = documentalsContainer.querySelectorAll('.documental');
            let currentIndex = 0;

            function showNextDocumental() {
                const nextIndex = (currentIndex + 1) % documentals.length;
                const nextDocumental = documentals[nextIndex];
                documentalsContainer.scrollLeft += nextDocumental.offsetWidth + 200;
                currentIndex = nextIndex;
                if (nextIndex === 0) {
                    documentalsContainer.scrollLeft = 0;
                }
            }


            setInterval(showNextDocumental, 2000);

            var animateButton = function(e) {

                e.preventDefault;
                //reset animation
                e.target.classList.remove('animate');

                e.target.classList.add('animate');
                setTimeout(function(){
                    e.target.classList.remove('animate');
                },700);
            };

            var bubblyButtons = document.getElementsByClassName("bubbly-button");

            for (var i = 0; i < bubblyButtons.length; i++) {
                bubblyButtons[i].addEventListener('click', animateButton, false);
            }
        </script>

    </div>
</div>
