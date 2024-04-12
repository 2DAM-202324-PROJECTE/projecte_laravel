<div>
    <div>
        <img src="{{ $media->image_uri }}" alt="{{ $media->name }}" class="img-fluid">
    </div>
    <div>
        <h1>Media Preview</h1>
        <h2>{{ $media->name }}</h2>
        <p>{{ $media->description }}</p>
        <a href="{{ $media->path }}" target="_blank">View</a>
        <button wire:click="playMedia">Play</button>
    </div>
</div>
