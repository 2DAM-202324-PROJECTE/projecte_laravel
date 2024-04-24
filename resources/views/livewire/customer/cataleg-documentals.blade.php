
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
        <h2 class="text-center pt-12 mb-8 text-5xl tracking-wide font-semibold" style="font-family: 'Dosis', sans-serif; color: #7e634e">DOCUMENTALS</h2>
        <div id="documentalsContainer" class="grid sm:grid-rows-1 lg:grid-cols-6 gap-4 md:mx-16 sm:mx-8 lg:mx-24 xl:mx-32 rounded-lg bg-yellow-900 sm:px-12 lg:px-6" style="background: #907761">
            @foreach(array_slice($documentals, 0, 6) as $index => $documental)
                <div class="m-2 mb-4 mt-4 documental"> <!-- Ajusta el margen inferior aquí -->
                    <div>
                        <button wire:click="showOrHideModal({{ $documental['id'] }})">
                            <img class="rounded-lg shadow-lg " src="{{ $documental['image_uri'] }}" alt="{{ $documental['name'] }}" /> <!-- Ajusta el tamaño de la imagen aquí -->
                        </button>
                        <p class="text-sm flex justify-center font-medium mt-2 text-gray-300 documental-name" style="font-family: 'Biryani', sans-serif;">{{ $documental['name'] }}</p>
                    </div>
                </div>
                @if (($index + 1) % 6 == 0)
                    @if (!$loop->last)
        </div>
        <div class="grid grid-cols-6 gap-4 mx-20 rounded-lg bg-yellow-900 px-6 mt-4 mb-4"> <!-- Ajusta el margen superior aquí -->
            @endif

            @endif
            @endforeach
            @if($isModalVisible)
                <livewire:customer.media-modal :mediaId="$modalMediaId"/>
            @endif
        </div>
        <div id="loadMoreBtnD" class="flex justify-center mt-4 mb-12 pb-20">
            <button id="loadMoreDocumentals" class="bg-white py-2 px-4 text-sm tracking-wide rounded-lg text-white" style="background: #69503c;">Cargar més</button>
        </div>

        <script>
            document.getElementById('loadMoreDocumentals').addEventListener('click', function() {
                var container = document.getElementById('documentalsContainer');
                var lastVisibleIndex = container.querySelectorAll('.m-2').length;
                var documentals = {!! json_encode($documentals) !!};
                var nextDocumentals = documentals.slice(lastVisibleIndex, lastVisibleIndex + 6);

                nextDocumentals.forEach(function(documental) {
                    var div = document.createElement('div');
                    div.className = 'm-2 mb-4'; // Agrega el margen inferior aquí
                    div.innerHTML = `
                <div>
                    <img class="rounded-lg shadow-lg" src="${documental['image_uri']}" alt="${documental['name']}" />
                    <p class="text-sm flex justify-center font-medium mt-2 text-gray-300" style="font-family: 'Biryani', sans-serif;">${documental['name']}</p>
                </div>
            `;
                    container.appendChild(div);
                });

                // Agrega margen superior a la fila recién agregada
                var newRows = container.querySelectorAll('.m-2.mb-4');
                newRows[newRows.length - nextDocumentals.length].style.marginTop = '20px';

                if (lastVisibleIndex + nextDocumentals.length >= documentals.length) {
                    document.getElementById('loadMoreBtnD').style.display = 'none';
                }
            });

            function search_media() {
                let input = document.getElementById('searchbar').value.toLowerCase();
                let documentals = document.querySelectorAll('.documental');

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
            }
        </script>



    </div>
</div>
