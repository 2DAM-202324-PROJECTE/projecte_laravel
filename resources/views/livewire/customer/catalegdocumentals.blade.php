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

    <div class="">
        <div class="  sm:justify-center md:justify-center lg:justify-end p-6">
            <h2 class="pt-12 mb-8 text-center text-5xl tracking-wide font-semibold" style="font-family: 'Dosis', sans-serif; color: #0092FF">DOCUMENTALS</h2>
            <div class="w-full md:grid lg:flex lg:pr-8">
                <div class="dropdown mr-4 flex text-center">
                    <button class="dropbtn text-center">Gèneres</button>
                    <div class="dropdown-content">
                        <a href="#" wire:click.prevent="filterByGenere('Tots')">Tots</a>
                        @foreach($generes as $genere)
                            <a href="#" wire:click.prevent="filterByGenere('{{ $genere->name }}')">{{ $genere->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="lg:ml-auto mt-4 mb-2"> <!-- Este div se moverá a la derecha del todo -->
                    <form class="sm:flex justify-center">
                        <input id="searchbar" name="q" class="inline w-48 rounded-md bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:placeholder-gray-400 focus:outline-none sm:text-sm" style="border: none; --tw-ring-color: #5CDBFF; font-size: 12px; letter-spacing: 1px" placeholder="Buscar.." type="search" autofocus="" onkeyup="search_media()">
                        <div class="flex justify-center ">
                            <button id="botoBuscar" type="submit" class="bg-white md:ml-4 py-2 px-4 text-sm tracking-wide rounded-lg text-white">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="documentalsContainer" class="sm:flex sm:flex-wrap justify-center gap-4 mx-20 mb-4">
            @foreach($documentals as $index => $documental)
                <div class="w-full md:w-1/3 lg:w-1/4 xl:w-1/6 m-2 md:flex-wrap mb-4 documental"> <!-- Ajusta el ancho de cada película aquí -->
                    <div>
                        <button wire:click="showOrHideModal({{ $documental['id'] }})">
                            <img class="rounded-lg shadow-lg" src="{{ $documental['image_uri'] }}" alt="{{ $documental['name'] }}" />
                        </button>
                        <p class="text-sm flex justify-center font-medium mt-2 text-gray-300 documental-name" style="font-family: 'Biryani', sans-serif;">{{ $documental['name'] }}</p>
                    </div>
                </div>
            @endforeach
            @if($isModalVisible)
                <livewire:customer.media-modal :mediaId="$modalMediaId"/>
            @endif
        </div>

        <div id="paginationControls" class="flex justify-center my-4">
            <button id="prevPage" class="bg-gray-700 text-white px-4 py-2 m-1 rounded" onclick="changePage(-1)">Atràs</button>
            <button id="nextPage" class="bg-gray-700 text-white px-4 py-2 m-1 rounded" onclick="changePage(1)">Davant</button>
        </div>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const documentalsContainer = document.getElementById('documentalsContainer');
                const documentals = documentalsContainer.querySelectorAll('.documental');
                const paginationControls = document.getElementById('paginationControls');
                const rowsPerPage = 15;
                let currentPage = 1;

                function displayDocumentals(page) {
                    const start = (page - 1) * rowsPerPage;
                    const end = start + rowsPerPage;

                    documentals.forEach((documental, index) => {
                        documental.style.display = (index >= start && index < end) ? 'block' : 'none';
                    });

                    // Disable prev button if on first page
                    document.getElementById('prevPage').disabled = (page === 1);

                    // Disable next button if on last page
                    document.getElementById('nextPage').disabled = (end >= documentals.length);
                }

                function changePage(direction) {
                    currentPage += direction;
                    displayDocumentals(currentPage);
                }

                displayDocumentals(currentPage); // Initial call to display documentals

                // Add event listeners to buttons
                document.getElementById('prevPage').addEventListener('click', () => changePage(-1));
                document.getElementById('nextPage').addEventListener('click', () => changePage(1));
            });

            function search_media() {
                let input = document.getElementById('searchbar').value.toLowerCase();
                let documentals = document.querySelectorAll('.documental');

                // Mostrar todas las películas y documentales
                documentals.forEach(function(documental) {
                    documental.style.display = "block";
                });

                // Filtrar según el término de búsqueda
                if (input.trim() !== "") {
                    documentals.forEach(function(documental) {
                        let documentalName = documental.querySelector('.documental-name').innerText.toLowerCase();
                        if (!documentalName.includes(input)) {
                            documental.style.display = "none";
                        }
                    });
                } else {
                    currentPage = 1;
                    displayDocumentals(currentPage);
                }
            }

            // Escuchar el evento de cambio en el campo de búsqueda
            document.getElementById('searchbar').addEventListener('input', search_media);
        </script>




    </div>
</div>
