@props(['id' => null])

<div class="bg-white border-b border-gray-200 flex justify-center items-center">
    <div class="mx-auto p-4 flex flex-center justify-center" style="flex: 2;">
        <iframe width="900" height="500" src="https://www.youtube.com/embed/GD36Qfn3GRo?si=0p2huejKPEmnrdX2"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div style="flex: 1;">
        <livewire:customer.xatinteractiu :xat_id="$id" />
    </div>
</div>


