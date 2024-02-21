<div>
    <form wire:submit.prevent="{{ $isCreation ? 'save' : 'update' }}">
        <label for="name">Nom:</label>
        <input type="text" id="title" wire:model="name">
        <button type="submit">Save</button>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @elseif (session()->has('message-danger'))
            <div class="alert alert-danger">
                {{ session('message-danger') }}
            </div>
        @endif
    </form>
</div>
