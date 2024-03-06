<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @elseif (session()->has('message-danger'))
        <div class="alert alert-danger">
            {{ session('message-danger') }}
        </div>
    @endif

    <form wire:submit="{{ $isCreation ? 'save' : 'update' }}">
        <label for="name">Name:</label>
        <input type="text" id="name" wire:model="name">
        @error('name') {{ $message }} @enderror
        <label for="description">Description:</label>
        <input type="text" id="description" wire:model="description">
        @error('description') {{ $message }} @enderror
        <label for="path">Path:</label>
        <input type="text" id="path" wire:model="path">
        @error('path') {{ $message }} @enderror
        <button type="submit">Save</button>
    </form>
</div>
