<div class=" bg-gray-900">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Biryani:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Biryani:wght@200;300;400;600;700;800;900&family=Dosis:wght@200..800&family=Manrope:wght@200..800&family=Rubik+Scribble&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <style>
        #vertical{
            height: calc(100vh - 2rem);
            max-width: 20rem;
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
        }
        #botoBuscar:hover {
            background: #c7b69f;
        }
        #botoBuscar{
            background: #39A9FE;
            transition: background 0.3s ease;
        }
        .right-20 {
            right: 20px; /* Ajusta el valor según tu diseño */
        }
        /* Style The Dropdown Button */
        .dropbtn {
            background-color: #AED6F1;
            color: white;
            padding: 10px 16px;
            font-size: 14px;
            cursor: pointer;
            border: 2px solid #AED6F1;
            border-radius: 10px;
            letter-spacing: 2px;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;

        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            margin-top: 2px;
            display: none;
            position: absolute;
            background-color: rgba(248, 249, 249, 0.9);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border: rgba(248, 249, 249, 0.9);
            border-radius: 10px;

        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: #85C1E9;
            padding: 12px 16px;
            font-size: 13px;
            text-decoration: none;
            display: block;
            border: rgba(248, 249, 249, 0.9);
            border-radius: 10px;
            letter-spacing: 2px;
            font-weight: bold;

        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1}

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #D6EAF8;
            color: #5DADE2;
            font-weight: bold;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.getElementById('vertical');
            var toggleButton = document.getElementById('toggleSidebar');

            toggleButton.addEventListener('click', function() {
                if (sidebar.classList.contains('hidden')) {
                    // Mostrar la barra lateral
                    sidebar.classList.remove('hidden');
                    sidebar.style.width = '20rem'; // O cualquier ancho que desees

                    // Mover el botón toggle al lado derecho del sidebar
                    toggleButton.classList.add('right-20'); // Agrega una clase con la propiedad right para ajustar la posición
                } else {
                    // Ocultar la barra lateral
                    sidebar.classList.add('hidden');
                    sidebar.style.width = '0';

                    // Mover el botón toggle a su posición original
                    toggleButton.classList.remove('right-20'); // Elimina la clase para restaurar la posición original
                }
            });
        });
    </script>


    <div class="">
        <div class="  sm:justify-center md:justify-center lg:justify-end p-6">
            <h2 class="pt-12 mb-8 text-center text-5xl tracking-wide font-semibold" style="font-family: 'Dosis', sans-serif; color: #0092FF">PEL·LÍCULES</h2>

            <div class="w-full flex items-center lg:pr-8">
                <div class="dropdown mr-4">
                    <button class="dropbtn">Gèneres</button>
                    <div class="dropdown-content">
                        <a href="#" wire:click.prevent="filterByGenere('Tots')">Tots</a>
                        @foreach($generes as $genere)
                            <a href="#" wire:click.prevent="filterByGenere('{{ $genere->name }}')">{{ $genere->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="ml-auto"> <!-- Este div se moverá a la derecha del todo -->
                    <form class="sm:flex sm:items-center">
                        <input id="searchbar" name="q" class="inline w-48 rounded-md bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:placeholder-gray-400 focus:outline-none sm:text-sm" style="border: none; --tw-ring-color: #5CDBFF; font-size: 12px; letter-spacing: 1px" placeholder="Buscar.." type="search" autofocus="" onkeyup="search_media()">
                        <div class="flex justify-center sm:justify-start">
                            <button id="botoBuscar" type="submit" class="bg-white ml-4 py-2 px-4 text-sm tracking-wide rounded-lg text-white">Search</button>
                        </div>
                    </form>
                </div>
            </div>



        </div>

        <div id="pelisContainer" class="sm:flex sm:flex-wrap justify-center gap-4 mx-20 mb-4">
            @foreach($pelis as $index => $peli)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 m-2 md:flex-wrap mb-4 movie"> <!-- Ajusta el ancho de cada película aquí -->
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
            <button id="loadMorePelis" class="bg-white py-2 px-4 text-sm tracking-wide rounded-lg text-white" style="background: #39A9FE;">Cargar més</button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var container = document.getElementById('pelisContainer');
                var rows = container.querySelectorAll('.movie');
                var rowsPerPage = 6;
                var currentPage = 1;
                var totalPages = Math.ceil(rows.length / rowsPerPage);

                // Ocultar todas las filas excepto la primera página al cargar la página
                rows.forEach(function(row, index) {
                    if (index >= rowsPerPage) {
                        row.style.display = 'none';
                    }
                });

                // Manejar clic en el botón "Cargar más" y "Ocultar"
                var loadMoreButton = document.getElementById('loadMorePelis');
                loadMoreButton.addEventListener('click', function() {
                    var start = currentPage * rowsPerPage;
                    var end = (currentPage + 1) * rowsPerPage;

                    // Si estamos mostrando todas las filas, ocultar todas menos la primera fila
                    if (currentPage === totalPages) {
                        rows.forEach(function(row, index) {
                            if (index >= rowsPerPage) {
                                row.style.display = 'none';
                            }
                        });
                        loadMoreButton.textContent = 'Cargar más';
                        currentPage = 1;
                        return;
                    }

                    // Mostrar las filas de la página actual
                    for (var i = start; i < end; i++) {
                        if (rows[i]) {
                            rows[i].style.display = 'block';
                        }
                    }

                    // Cambiar el texto del botón a "Ocultar" si estamos mostrando todas las filas
                    if (end >= rows.length) {
                        loadMoreButton.textContent = 'Ocultar';
                    }

                    currentPage++;

                    // Ocultar el botón si estamos en la última página
                    if (currentPage > totalPages) {
                        loadMoreButton.style.display = 'none';
                    }
                });

                // Función para manejar la búsqueda
                function search_media() {
                    let input = document.getElementById('searchbar').value.toLowerCase();
                    let movies = document.querySelectorAll('.movie');

                    // Mostrar todas las películas y documentales
                    movies.forEach(function(movie) {
                        movie.style.display = "block";
                    });

                    // Filtrar según el término de búsqueda
                    if (input.trim() !== "") {
                        movies.forEach(function(movie) {
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
                        loadMoreButton.textContent = 'Cargar más';
                        loadMoreButton.style.display = 'block';
                    }
                }

                // Escuchar el evento de cambio en el campo de búsqueda
                document.getElementById('searchbar').addEventListener('input', search_media);
            });
        </script>




    </div>
</div>
