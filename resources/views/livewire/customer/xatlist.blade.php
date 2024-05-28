<div>
    <div class="p-4 text-2xl text-gray-200" style="background: #553d2a">
        <p>Total de xats relacionats amb aquest vídeo: {{ $xatsCount }}</p>
    </div>


    @foreach($xatsRelacionats ?? [] as $xat)
        <a href="{{ route('customer.xatmedia', ['id' => $xat->id]) }}" style="outline: none; text-decoration: none; background: #907761">
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
