
<div class=" bg-black pb-32 mt-32">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Biryani:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Biryani:wght@200;300;400;600;700;800;900&family=Dosis:wght@200..800&family=Manrope:wght@200..800&family=Rubik+Scribble&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <style>
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
        }
        #botoBuscar:hover {
            background: #c7b69f;
        }
        #botoBuscar{
            background: #69503c;
            transition: background 0.3s ease;
        }
        #documentalsContainer {
            scroll-behavior: smooth;
            overflow-x: hidden;
            white-space: nowrap;
        }

        .documental {
            width: 270px;
            margin-right: 20px;
        }

        #pelisContainer {
            scroll-behavior: smooth;
            overflow-x: hidden;
            white-space: nowrap;
        }

        .movie {
            width: 270px;
            margin-right: 20px;
        }
    </style>
    <div class="">
        <div class="flex flex-1 items-end sm:justify-center md:justify-center lg:justify-end p-6">
            <div class="w-full max-w-lg">
                <form class="mt-5 sm:flex sm:items-center">
                    <input id="searchbar" name="q" class="inline w-full rounded-md bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:placeholder-gray-400 focus:outline-none sm:text-sm" style="border: none; --tw-ring-color: #EB984E; font-size: 12px; letter-spacing: 1px" placeholder="Buscar.." type="search" autofocus="" oninput="search_media()">

                    <div class="flex justify-center sm:justify-start">
                        <button id="botoBuscar" type="submit" class="bg-white ml-4 py-2 px-4 text-sm tracking-wide rounded-lg text-white">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <h2 class="pt-12 mb-8 text-center text-5xl tracking-wide font-semibold" style="font-family: 'Dosis', sans-serif; color: #7e634e">PEL·LÍCULES</h2>
        <div id="pelisContainer" class="overflow-hidden flex rounded-lg bg-yellow-900 sm:px-12 lg:px-6 py-4 sm:mx-12 md:mx-40" style="background: #907761">
            @foreach($pelis as $peli)
                <div class="movie flex-shrink-0">
                    <button wire:click="showOrHideModal({{ $peli['id'] }})">
                        <img class="rounded-lg shadow-lg " src="{{ $peli['image_uri'] }}" alt="{{ $peli['name'] }}" /> <!-- Ajusta el tamaño de la imagen aquí -->
                    </button>
                    <p class="text-sm flex justify-center font-medium mt-2 text-gray-300 movie-name" style="font-family: 'Biryani', sans-serif;">{{ $peli['name'] }}</p>
                </div>
            @endforeach
                @if($isModalVisible)
                    <livewire:customer.media-modal :mediaId="$modalMediaId"/>
                @endif
        </div>


        <script>
            const pelisContainer = document.getElementById('pelisContainer');
            const movies = pelisContainer.querySelectorAll('.movie');
            let currentIndexMovies = 0;

            function showNextMovie() {
                const nextIndex = (currentIndexMovies + 1) % movies.length;
                const nextMovie = movies[nextIndex];
                pelisContainer.scrollLeft += nextMovie.offsetWidth + 20;
                currentIndexMovies = nextIndex;
                if (nextIndex === 0) {
                    pelisContainer.scrollLeft = 0;
                }
            }


            setInterval(showNextMovie, 3000);
        </script>


        <script>
            function search_media() {
                let input = document.getElementById('searchbar').value.toLowerCase();
                let movies = document.querySelectorAll('.movie');
                let documentals = document.querySelectorAll('.documental');

                movies.forEach(function (movie) {
                    movie.style.display = "block";
                });
                documentals.forEach(function (documental) {
                    documental.style.display = "block";
                });

                if (input.trim() !== "") {
                    movies.forEach(function (movie) {
                        let movieName = movie.querySelector('.movie-name').innerText.toLowerCase();
                        if (!movieName.includes(input)) {
                            movie.style.display = "none";
                        }
                    });
                    documentals.forEach(function (documental) {
                        let documentalName = documental.querySelector('.documental-name').innerText.toLowerCase();
                        if (!documentalName.includes(input)) {
                            documental.style.display = "none";
                        }
                    });
                }
            }

        </script>





        <h2 class="text-center pt-12 mb-8 text-5xl tracking-wide font-semibold" style="font-family: 'Dosis', sans-serif; color: #7e634e">DOCUMENTALS</h2>
        <div id="documentalsContainer" class="overflow-hidden flex rounded-lg bg-yellow-900 sm:px-12 lg:px-6 py-4 sm:mx-12 md:mx-40" style="background: #907761">
            @foreach($documentals as $documental)
                <div class="documental flex-shrink-0"> <!-- Agrega relleno aquí -->
                    <button wire:click="showOrHideModal({{ $documental['id'] }})">
                        <img class="rounded-lg shadow-lg " src="{{ $documental['image_uri'] }}" alt="{{ $documental['name'] }}" /> <!-- Ajusta el tamaño de la imagen aquí -->
                    </button>
                    <p class="text-sm flex justify-center font-medium mt-2 text-gray-300 documental-name" style="font-family: 'Biryani', sans-serif;">{{ $documental['name'] }}</p>
                </div>
            @endforeach
        </div>

        <script>
            const documentalsContainer = document.getElementById('documentalsContainer');
            const documentals = documentalsContainer.querySelectorAll('.documental');
            let currentIndex = 0;

            function showNextDocumental() {
                const nextIndex = (currentIndex + 1) % documentals.length;
                const nextDocumental = documentals[nextIndex];
                documentalsContainer.scrollLeft += nextDocumental.offsetWidth + 20;
                currentIndex = nextIndex;
                if (nextIndex === 0) {
                    documentalsContainer.scrollLeft = 0;
                }
            }


            setInterval(showNextDocumental, 3000);
        </script>



    </div>
</div>
