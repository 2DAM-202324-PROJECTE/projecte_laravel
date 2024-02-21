<div>Category list
    <br/>
    @foreach ($categories as $category)
        {{$category}}
        <button type="button">
            <a href="{{ route('categories.update',['id'=> $category->id]) }}">Edit</a>
        </button>
        <button type="button" wire:click="delete({{ $category->id }})"
                wire:confirm="Are you sure you want to delete this category?">
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
