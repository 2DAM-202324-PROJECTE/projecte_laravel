@props(['id' => null, 'mediaId' => null])

<div class="bg-white border-b border-gray-200 flex justify-center items-center">
    <div class=" mx-4 p-4  flex-center justify-center" style="flex: 2;">
        <livewire:medias.media-player :id="$mediaId" />
    </div>
    <div style="flex: 1;">
        <livewire:customer.xatinteractiu :xat_id="$id" />
    </div>
</div>


