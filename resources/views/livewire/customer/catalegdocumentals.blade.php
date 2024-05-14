<div class=" bg-black">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Biryani:wght@200;300;400;600;700;800;900&display=swap"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Biryani:wght@200;300;400;600;700;800;900&family=Dosis:wght@200..800&family=Manrope:wght@200..800&family=Rubik+Scribble&display=swap"
        rel="stylesheet">
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

        #botoBuscar {
            background: #69503c;
            transition: background 0.3s ease;
        }
    </style>
    <div class="">
        <p class="text-white">
            Aa
        </p>
        <div class="  sm:justify-center md:justify-center lg:justify-end p-6">
            <h2 class="pt-12 mb-8 text-center text-5xl tracking-wide font-semibold"
                style="font-family: 'Dosis', sans-serif; color: #7e634e">PEL·LÍCULES</h2>

            <div class="w-full grid lg:justify-items-end sm:justify-items-center lg:pr-8">
                <form class="mt-5 mb-16 sm:flex sm:items-center">
                    <input id="searchbar" name="q"
                           class="inline w-full rounded-md bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:placeholder-gray-400 focus:outline-none sm:text-sm"
                           style="border: none; --tw-ring-color: #EB984E; font-size: 12px; letter-spacing: 1px"
                           placeholder="Buscar.." type="search" autofocus="" onkeyup="search_media()">

                    <div class="flex justify-center sm:justify-start">
                        <button id="botoBuscar" type="submit"
                                class="bg-white ml-4 py-2 px-4 text-sm tracking-wide rounded-lg text-white">Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="documentalsContainer" class="sm:flex sm:flex-wrap justify-center gap-4 mx-20 mb-4">
            @foreach($documentals as $index => $documental)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 m-2 md:flex-wrap mb-4 documental">
                    <!-- Ajusta el ancho de cada película aquí -->
                    <div>
                        <button wire:click="showOrHideModal({{ $documental['id'] }})">
                            <img class="rounded-lg shadow-lg" src="{{ $documental['image_uri'] }}"
                                 alt="{{ $documental['name'] }}"/>
                        </button>
                        <p class="text-sm flex justify-center font-medium mt-2 text-gray-300 documental-name"
                           style="font-family: 'Biryani', sans-serif;">{{ $documental['name'] }}</p>
                    </div>
                </div>
            @endforeach
            @if($isModalVisible)
                <livewire:customer.media-modal :mediaId="$modalMediaId"/>
            @endif
        </div>


        <div class="flex justify-center mt-4 pb-32"> <!-- Contenedor flex para centrar el botón -->
            <button id="loadMoreDocumentals" class="bg-white py-2 px-4 text-sm tracking-wide rounded-lg text-white"
                    style="background: #69503c;">Cargar més
            </button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var container = document.getElementById('documentalsContainer');
                var rows = container.querySelectorAll('.documental');
                var rowsPerPage = 6;
                var currentPage = 1;
                var totalPages = Math.ceil(rows.length / rowsPerPage);

                // Ocultar todas las filas excepto la primera página al cargar la página
                rows.forEach(function (row, index) {
                    if (index >= rowsPerPage) {
                        row.style.display = 'none';
                    }
                });

                // Manejar clic en el botón "Cargar más" y "Ocultar"
                var loadMoreButton = document.getElementById('loadMoreDocumentals');
                loadMoreButton.addEventListener('click', function () {
                    var start = currentPage * rowsPerPage;
                    var end = (currentPage + 1) * rowsPerPage;

                    // Si estamos mostrando todas las filas, ocultar todas menos la primera fila
                    if (currentPage === totalPages) {
                        rows.forEach(function (row, index) {
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
                    let documentals = document.querySelectorAll('.documental');

                    // Mostrar todas las películas y documentales
                    documentals.forEach(function (documental) {
                        documental.style.display = "block";
                    });

                    // Filtrar según el término de búsqueda
                    if (input.trim() !== "") {
                        documentals.forEach(function (documental) {
                            let documentalName = documental.querySelector('.documental-name').innerText.toLowerCase();
                            if (!documentalName.includes(input)) {
                                documental.style.display = "none";
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
