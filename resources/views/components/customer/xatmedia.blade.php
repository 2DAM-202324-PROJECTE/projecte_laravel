@props(['id' => null, 'mediaId' => null])

<div class="bg-white border-b border-gray-200">
    <livewire:medias.media-player :id="$mediaId" />
    <livewire:customer.xatinteractiu :xat_id="$id" />



</div>


