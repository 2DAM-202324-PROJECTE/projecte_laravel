<div>Media list
    <br/>
    @foreach ($medias as $media)
        {{$media}}
    <button type="button">
        <a href="{{ route('medias.update', ['id' => $media->id]) }}">Edit</a>
    </button>

    <button type="button" wire:click="delete({{ $media->id }})"
        wire:confirm="Are you sure you want to delete this media?">
        Delete
    </button>
        <br/>
    @endforeach
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @elseif (session()->has('message-danger'))
        <div class="alert alert-danger">
            {{ session('message-danger') }}
        </div>
    @endif
</div>


