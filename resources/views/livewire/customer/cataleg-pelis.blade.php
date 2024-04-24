<div class=" bg-black">
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
    </style>
    <div class="">
        <div class="flex flex-1 items-end sm:justify-center md:justify-center lg:justify-end p-6">
            <div class="w-full max-w-lg">
                <form class="mt-5 sm:flex sm:items-center">
                    <input id="searchbar" name="q" class="inline w-full rounded-md bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:placeholder-gray-400 focus:outline-none sm:text-sm" style="border: none; --tw-ring-color: #EB984E; font-size: 12px; letter-spacing: 1px" placeholder="Buscar.." type="search" autofocus="" onkeyup="search_media()">

                    <div class="flex justify-center sm:justify-start">
                        <button id="botoBuscar" type="submit" class="bg-white ml-4 py-2 px-4 text-sm tracking-wide rounded-lg text-white">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <h2 class="pt-12 mb-8 text-center text-5xl tracking-wide font-semibold" style="font-family: 'Dosis', sans-serif; color: #7e634e">PEL·LÍCULES</h2>
        <div id="pelisContainer" class="flex flex-wrap justify-center gap-4 mx-20 mb-4">
            @foreach($pelis as $index => $peli)
                <div class="m-2 mb-4 movie" style="max-width: calc(100% / 7 - 8px); {{ $isModalVisible ? 'display: none;' : '' }}"> <!-- Ajusta el margen y el ancho máximo aquí -->
                    <div>
                        <button wire:click="showOrHideModal({{ $peli['id'] }})">
                            <img class="rounded-lg shadow-lg" src="{{ $peli['image_uri'] }}" alt="{{ $peli['name'] }}" />
                        </button>
                        <p class="text-sm flex justify-center font-medium mt-2 text-gray-300 movie-name" style="font-family: 'Biryani', sans-serif;">{{ $peli['name'] }}</p>
                    </div>
                </div>
            @endforeach

        @if($isModalVisible)
                <livewire:customer.media-modal :mediaId="$modalMediaId"/>
            @endif
        </div>

        <div class="flex justify-center mt-4 pb-32"> <!-- Contenedor flex para centrar el botón -->
            <button id="loadMorePelis" class="bg-white py-2 px-4 text-sm tracking-wide rounded-lg text-white" style="background: #69503c;">Cargar més</button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var container = document.getElementById('pelisContainer');
                var rows = container.querySelectorAll('.movie');
                var rowsPerPage = 6;
                var hideAllRowsExceptFirst = @json($hideAllRowsExceptFirst);
                var currentPage = 1;
                var totalPages = Math.ceil(rows.length / rowsPerPage);

                // Ocultar todas las filas excepto la primera página al cargar la página
                rows.forEach(function(row, index) {
                    if (index >= rowsPerPage) {
                        row.style.display = 'none';
                    }
                });

                // Manejar clic en el botón "Cargar más"
                document.getElementById('loadMorePelis').addEventListener('click', function() {
                    var start = currentPage * rowsPerPage;
                    var end = (currentPage + 1) * rowsPerPage;

                    if ({{$isModalVisible ? 'true' : 'false'}}) {
                        return;
                    }

                    // Mostrar las filas de la página actual
                    for (var i = start; i < end; i++) {
                        if (rows[i]) {
                            rows[i].style.display = 'block';
                        }
                    }

                    currentPage++;

                    // Ocultar el botón si estamos en la última página
                    if (end >= rows.length) {
                        document.getElementById('loadMoreBtnP').style.display = 'none';
                    }
                });

                // Función para manejar la búsqueda
                function search_media() {
                    let input = document.getElementById('searchbar').value.toLowerCase();
                    let movies = document.querySelectorAll('.movie');

                    if ({{$isModalVisible ? 'true' : 'false'}}) {
                        return;
                    }

                    // Mostrar todas las películas y documentales
                    movies.forEach(function (movie) {
                        movie.style.display = "block";
                    });

                    // Filtrar según el término de búsqueda
                    if (input.trim() !== "") {
                        movies.forEach(function (movie) {
                            let movieName = movie.querySelector('.movie-name').innerText.toLowerCase();
                            if (!movieName.includes(input)) {
                                movie.style.display = "none";
                            }
                        });
                    }

                    // Verificar si el campo de búsqueda está vacío y restaurar el estado inicial si es así
                    if (input.trim() === "") {
                        currentPage = 1;
                        for (var i = rowsPerPage; i < rows.length; i++) {
                            rows[i].style.display = 'none';
                        }
                        document.getElementById('loadMoreBtnP').style.display = 'block';
                    }
                }

                // Escuchar el evento de cambio en el campo de búsqueda
                document.getElementById('searchbar').addEventListener('input', search_media);
            });
            document.addEventListener('livewire:load', function () {
                if (hideAllRowsExceptFirst) {
                    var container = document.getElementById('pelisContainer');
                    var rows = container.querySelectorAll('.movie');

                    // Oculta todas las filas excepto la primera
                    rows.forEach(function(row, index) {
                        if (index !== 0) {
                            row.style.display = 'none';
                        }
                    });
                }
            });


        </script>

    </div>
</div>
