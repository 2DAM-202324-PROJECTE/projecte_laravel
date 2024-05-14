<div>
    <div class="p-4 bg-gray-100 ">
        <p>Total de xats relacionats amb aquest vídeo: {{ $xatsCount }}</p>
    </div>


    @foreach($xatsRelacionats ?? [] as $xat)
        <div class="p-4 border-b">
            <!-- Mostrar detalls del xat -->
            <p><strong>ID:</strong> {{ $xat->id }}</p>
            <p><strong>Nombre:</strong> {{ $xat->nom }}</p>
            <p><strong>Descripción:</strong> {{ $xat->descripcio }}</p>
            <p><strong>Media:</strong> {{ $xat->media_id }}</p>
            <p><strong>Fecha de creació:</strong> {{ $xat->created_at }}</p>
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
